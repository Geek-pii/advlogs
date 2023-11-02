<template>
  <table class="table table-bordered table-striped m-2">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Direction</th>
        <th>Get Notification</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(route, routeIndex) in routes">
        <td>{{ routeIndex + 1 }}</td>
        <td v-if="route.search_origin == 'region_search'">
          {{ route.origin_area.join(", ") }}
        </td>
        <td v-else>
          {{
            [
              route.origin_city,
              route.origin_state,
              route.origin_radius + "miles",
            ].join(", ")
          }}
        </td>
        <td v-if="route.search_dest == 'region_search'">
          {{ route.dest_area.join(", ") }}
        </td>
        <td v-else>
          {{
            [
              route.dest_city,
              route.dest_state,
              route.dest_radius + "miles",
            ].join(", ")
          }}
        </td>
        <td v-if="route.direction == 'Both'">Both Direction</td>
        <td v-else>One Direction Only</td>
        <td v-if="route.notification == 'Yes'">Yes</td>
        <td v-else>No</td>
        <td>
          <button
            class="btn btn-primary"
            @click="showEditItem(route, routeIndex)"
          >
            Edit
          </button>
          <button class="btn btn-danger" @click="deleteRoute(routeIndex)">
            Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>
  <EditRoute :baseEditItem="editItem" @baseUpdateRoute="updateRoute" />
</template>
<script setup>
import { provide, toRaw } from "vue";
let props = defineProps({
  baseRouteRegions: {
    type: Object,
    default: () => {
      return {};
    },
  },
  baseRouteRadius: {
    type: Object,
    default: () => {
      return {};
    },
  },
  baseRoutes: {
    type: Object,
    default: () => {
      return {};
    },
  },
  baseCarrierLoad: {
    type: Object,
    required: true
  }
});
provide("base-route-regions", props.baseRouteRegions);
provide("base-route-radius", props.baseRouteRadius);
</script>
<script>
import EditRoute from "./editRoute.vue";
export default {
  components: {
    EditRoute,
  },
  data() {
    return {
      routes: [],
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
      editRouteIndex: null,
    };
  },
  methods: {
    showEditItem(route, routeIndex) {
      this.editItem = route;
      this.routeIndex = routeIndex;
      $("#edit-route").modal("show");
    },
    updateRoute(route) {
      this.routes.splice(this.editRouteIndex, 1, toRaw(route));
      axios
        .put("/admin/company/"+this.baseCarrierLoad.company.id+"/carrier-load/" + this.baseCarrierLoad.id, {
          routes: this.routes,
        })
        .then(function (response) {
          $("#edit-route").modal("hide");
        })
        .catch(function (error) {
          alert('some thing went wrong')
        });
      
    },
    deleteRoute(routeIndex) {
      this.routes.splice(routeIndex, 1);
      axios
        .put("/admin/company/"+this.baseCarrierLoad.company.id+"/carrier-load/" + this.baseCarrierLoad.id, {
          routes: this.routes,
        })
        .then(function (response) {
          $("#edit-route").modal("hide");
        })
        .catch(function (error) {
          alert('some thing went wrong')
        });
    },
  },
  mounted() {
    this.routes = _.cloneDeep(this.baseRoutes);
  },
};
</script>
