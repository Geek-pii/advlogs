<template>
  <div class="modal" tabindex="-1" id="edit-route">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Route</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="row ml-0 mr-0" id="edit-route-form">
            <div class="col-md-5 border p-0" id="origin-box">
              <div class="route-header-box">
                <div class="font-weight-bold pr-2">Origin</div>
                <div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="search_origin"
                      id="origin_region_search"
                      :value="'region_search'"
                      v-model="editItem.search_origin"
                    />
                    <label class="form-check-label" for="origin_region_search"
                      >Tap one or more origin regions or states:</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="origin_city_search"
                      name="search_origin"
                      :value="'city_search'"
                      v-model="editItem.search_origin"
                    />
                    <label class="form-check-label" for="origin_city_search"
                      >City Search</label
                    >
                  </div>
                </div>
              </div>
              <div
                :class="{
                  region_search: true,
                  'd-none': editItem.search_origin == 'city_search',
                }"
              >
                <h6>Select One Area:</h6>
                <input
                  type="hidden"
                  name="origin_area"
                  v-model="editItem.region_search"
                />
                <div class="region_box">
                  <div
                    v-for="(region, key) in baseRouteRegions"
                    :class="{
                      'col-md-12 mb-1': true,
                      'bg-selected': editItem.origin_area.includes(
                        region.value
                      ),
                    }"
                    role="button"
                    @click="setOriginRegion(region.value)"
                  >
                    {{ region.label }}
                  </div>
                </div>
                <div id="origin_area-error" class="d-none text-danger">
                  Please select one of the area.
                </div>
              </div>
              <div
                :class="{
                  'city_search p-2': true,
                  'd-none': editItem.search_origin == 'region_search',
                }"
              >
                <div class="form-group border rounded p-1 shadow-none">
                  <small>* City</small>
                  <input
                    type="text"
                    class="form-control border-0 city_address"
                    ref="autocomplete"
                    name="origin_city"
                    v-model="editItem.origin_city"
                    placeholder="City"
                  />
                </div>
                <div class="d-flex justify-content-between">
                  <div class="form-group border rounded p-1">
                    <small>State</small>
                    <input
                      type="text"
                      name="origin_state"
                      class="form-control border-0 state"
                      placeholder="state"
                      v-model="editItem.origin_state"
                    />
                  </div>
                  <div class="form-group border rounded p-1 ml-1 mr-1">
                    <small> Postal Code </small>
                    <input
                      type="text"
                      name="origin_zip"
                      class="form-control border-0 zip_code border-none"
                      placeholder="Postal Code"
                      v-model="editItem.origin_zip"
                    />
                  </div>
                  <div class="form-group border rounded p-1">
                    <small> *Radius </small>
                    <select
                      class="form-control border-0"
                      name="origin_radius"
                      v-model="editItem.origin_radius"
                    >
                      <option
                        :value="key"
                        v-for="(radius, key) in baseRouteRadius"
                      >
                        {{ radius }} miles
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-5 border p-0" id="dest-box">
              <div class="route-header-box">
                <div class="font-weight-bold pr-2">Destination</div>
                <div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="search_dest"
                      id="search_dest_region"
                      :value="'region_search'"
                      v-model="editItem.search_dest"
                    />
                    <label class="form-check-label" for="search_dest_region"
                      >Tap one or more destination regions or states:</label
                    >
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="search_dest"
                      id="search_dest_city"
                      :value="'city_search'"
                      v-model="editItem.search_dest"
                    />
                    <label class="form-check-label" for="search_dest_city"
                      >City Search</label
                    >
                  </div>
                </div>
              </div>
              <div
                :class="{
                  region_search: true,
                  'd-none': editItem.search_dest == 'city_search',
                }"
              >
                <h6>Select One Area:</h6>
                <input type="hidden" name="dest_area" value="<%=dest_area%>" />
                <div class="region_box">
                  <div
                    v-for="(region, key) in baseRouteRegions"
                    :class="{
                      'col-md-12 mb-1': true,
                      'bg-selected': editItem.dest_area.includes(region.value),
                    }"
                    @click="setDestRegion(region.value)"
                  >
                    {{ region.label }}
                  </div>
                </div>
                <div id="dest_area-error" class="text-danger d-none">
                  Please select one of the area.
                </div>
              </div>
              <div
                :class="{
                  'city_search p-2': true,
                  'd-none': editItem.search_dest == 'region_search',
                }"
              >
                <div class="form-group border rounded p-1">
                  <small>* City</small>
                  <input
                    type="text"
                    class="form-control city_address border-0"
                    ref="autocomplete"
                    name="dest_city"
                    placeholder="City"
                    v-model="editItem.dest_city"
                  />
                </div>
                <div class="d-flex justify-content-between">
                  <div class="form-group border rounded p-1">
                    <small>State</small>
                    <input
                      type="text"
                      name="dest_state"
                      class="form-control state border-0"
                      placeholder="state"
                      v-model="editItem.dest_state"
                    />
                  </div>
                  <div class="form-group border rounded p-1 ml-1 mr-1">
                    <small> Postal Code </small>
                    <input
                      type="text"
                      name="dest_zip"
                      class="form-control zip_code border-0"
                      placeholder="Zip Code"
                      v-model="editItem.dest_zip"
                    />
                  </div>
                  <div class="form-group border rounded p-1">
                    <small> *Radius </small>
                    <select
                      class="form-control border-0"
                      name="dest_radius"
                      v-model="editItem.dest_radius"
                    >
                      <option
                        :value="key"
                        v-for="(radius, key) in baseRouteRadius"
                      >
                        {{ radius }} miles
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary" @click="saveChange">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { inject } from "vue";
const baseRouteRegions = inject("base-route-regions");
const baseRouteRadius = inject("base-route-radius");
</script>
<script>
import { toRaw } from "vue";
export default {
  props: {
    baseEditItem: {
      type: Object,
      default: () => {
        return {
          search_origin: "city_search",
          origin_area: [],
          origin_city: "",
          origin_state: "",
          origin_zip: "",
          origin_radius: "",
          search_dest: "region_search",
          dest_area: [],
          dest_city: "",
          dest_state: "",
          dest_zip: "",
          dest_radius: "",
        };
      },
    },
  },
  data() {
    return {
      editItem: {
        search_origin: "city_search",
        origin_area: [],
        origin_city: "",
        origin_state: "",
        origin_zip: "",
        origin_radius: "",
        search_dest: "region_search",
        dest_area: [],
        dest_city: "",
        dest_state: "",
        dest_zip: "",
        dest_radius: "",
      },
      autocomplete_addresses: [],
    };
  },
  watch: {
    baseEditItem: {
      handler: function (newVal, oldVal) {
        this.editItem = _.cloneDeep(newVal);
      },
      deep: true,
    },
  },
  methods: {
    setOriginRegion(originArea) {
      if (!_.includes(this.editItem.origin_area, originArea)) {
        this.editItem.origin_area.push(originArea);
      } else {
        _.remove(this.editItem.origin_area, (item) => item === originArea);
      }
    },
    setDestRegion(destArea) {
      if (!_.includes(this.editItem.dest_area, destArea)) {
        this.editItem.dest_area.push(destArea);
      } else {
        _.remove(this.editItem.dest_area, (item) => item === destArea);
      }
    },
    saveChange() {
      this.$emit("base-update-route", this.editItem);
    },
    placeChange(i, place) {
      let addressComponents = place.address_components;
      let state = "",
        postCode = "",
        streetAddress = "";
      for (const component of addressComponents) {
        const componentType = component.types[0];
        switch (componentType) {
          // street address
          case "street_number": {
            streetAddress = `${component.long_name}`;
            break;
          }
          // street address full
          case "route": {
            streetAddress += component.short_name;
            break;
          }
          // post code
          case "postal_code": {
            postCode = `${component.long_name}${postCode}`;
            break;
          }
          // post code with suffix
          case "postal_code_suffix": {
            postCode = `${postCode}-${component.long_name}`;
            break;
          }

          case "locality": {
            break;
          }

          // state
          case "administrative_area_level_1": {
            state = component.short_name;
            break;
          }
          // country
          case "country":
            break;
        }
      }

      if (i == 0) {
        this.editItem.origin_city = place.formatted_address;
        this.editItem.origin_state = state;
        this.editItem.origin_zip = postCode; 
      }
      if (i == 1) {
        this.editItem.dest_city = place.formatted_address;
        this.editItem.dest_state = state;
        this.editItem.dest_zip = postCode; 
      }
    },
  },
  created() {
    this.editItem = _.cloneDeep(this.baseEditItem);
  },
  mounted() {
    let autocomplete_addresses =
      document.getElementsByClassName("city_address");
    for (let i = 0; i < autocomplete_addresses.length; i++) {
      const autocomplete = autocomplete_addresses[i];
      this.autocomplete_addresses[i] = new google.maps.places.Autocomplete(
        autocomplete,
        { types: ['(cities)'],
          componentRestrictions: {
              country: "us"
          } 
        }
      );
      this.autocomplete_addresses[i].addListener("place_changed", () => {
        let place = this.autocomplete_addresses[i].getPlace();
        this.placeChange(i, toRaw(place));
      });
    }
  },
};
</script>
<style>
.region_box {
  max-height: 300px;
  overflow-y: scroll;
}
.route-header-box {
  display: flex;
  justify-content: space-between;
  background: #f5f5f5;
  align-items: center;
  padding: 10px;
}
.region_search {
  padding: 5px;
}
.region_search .region_box {
  border: 1px solid #ccc;
  overflow-y: scroll;
  height: 150px;
  margin: 5px;
}
.form-group .form-control {
  height: 25px;
  padding: 0;
  color: #6a6a6a;
  font-size: 12px;
}
.pac-container {
  z-index: 1051 !important;
}
.bg-selected {
  background-color: #dff0d8;
}
</style>
