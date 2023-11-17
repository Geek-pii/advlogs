function initMap() {}
function validateEmail(email) {
  var re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
jQuery(function ($) {
  $.validator.setDefaults({
    ignore: ":hidden, [readonly=readonly]",
  });
  $.validator.addMethod(
    "zip_code",
    function (value, element) {
      var re = new RegExp(/^\d{5}(?:[-\s]\d{4})?$/);
      return this.optional(element) || re.test(value);
    },
    "Please enter a correct format #####-#### or #####"
  );
  $.validator.addMethod(
    "email",
    function (value, element) {
      var re = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/);
      return this.optional(element) || re.test(value);
    },
    "Please enter a valid email address"
  );

  $.validator.addMethod(
    "phone_us",
    function (value, element) {
      value = value.replace(/ /g, "");
      if (value.includes("111")) {
        return true;
      }

      let valid = false;
      if (this.optional(element)) {
        valid = true;
      }
      if (
        new RegExp(
          /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]\d{2}-?\d{4}$/
        ).test(value)
      ) {
        valid = true;
      }
      return valid;
    },
    "Please enter valid phone number"
  );

  $.validator.addMethod(
    "phone_us_or_email",
    function (value, element, regexp) {
      value = value.replace(/ /g, "");
      if (value.includes("111")) {
        return true;
      }
      let valid = false;
      if (this.optional(element)) {
        valid = true;
      }
      if (
        new RegExp(
          /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]\d{2}-?\d{4}$/
        ).test(value)
      ) {
        valid = true;
      }
      if (
        new RegExp(
          /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
        ).test(value)
      ) {
        valid = true;
      }
      return valid;
    },
    "Please enter a email or phone number"
  );
  $.validator.addMethod(
    "strong_password",
    function (value, element) {
      let password = value;
      if (
        !/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(.{8,20}$)/.test(
          password
        )
      ) {
        return false;
      }
      return true;
    },
    function (value, element) {
      let password = $(element).val();
      if (!/^(.{8,20}$)/.test(password)) {
        return "Password must be between 8 to 20 characters long.";
      } else if (!/^(?=.*[A-Z])/.test(password)) {
        return "Password must contain at least one uppercase.";
      } else if (!/^(?=.*[a-z])/.test(password)) {
        return "Password must contain at least one lowercase.";
      } else if (!/^(?=.*[0-9])/.test(password)) {
        return "Password must contain at least one digit.";
      } else if (!/^(?=.*[!@#$%^&*])/.test(password)) {
        return "Password must contain special characters from !@#$%^&*.";
      }
      return false;
    }
  );

  $(".password-icon").on("click", function () {
    if ($(this).parent("div").prev("input").prop("type") == "password") {
      $(this).parent("div").prev("input").prop("type", "text");
      $(this).addClass("fa-eye-slash");
      $(this).removeClass("fa-eye");
    } else {
      $(this).parent("div").prev("input").prop("type", "password");
      $(this).addClass("fa-eye");
      $(this).removeClass("fa-eye-slash");
    }
  });

  $(document).on("keyup", ".password-field", function (e) {
    if (e.originalEvent != undefined) {
      if (e.originalEvent.getModifierState("CapsLock")) {
        $(this)
          .parent("div")
          .closest(".form-group")
          .find(".caps-lock")
          .removeClass("hidden");
      } else {
        $(this)
          .parent("div")
          .closest(".form-group")
          .find(".caps-lock")
          .addClass("hidden");
      }
    }
  });

  $.validator.prototype.checkForm = function () {
    this.prepareForm();
    for (
      var i = 0, elements = (this.currentElements = this.elements());
      elements[i];
      i++
    ) {
      if (
        this.findByName(elements[i].name).length != undefined &&
        this.findByName(elements[i].name).length > 1
      ) {
        for (
          var cnt = 0;
          cnt < this.findByName(elements[i].name).length;
          cnt++
        ) {
          this.check(this.findByName(elements[i].name)[cnt]);
        }
      } else {
        this.check(elements[i]);
      }
    }
    return this.valid();
  };

  // $.fn.draft = function () {
  //   "use strict";

  //   if (!localStorage) {
  //     return;
  //   }

  //   var form = $(this),
  //     fields = form.find("input,select,textarea,checkbox"),
  //     keyFor = function (field) {
  //       return form.attr("id") + $(field).attr("name");
  //     },
  //     clearFields = function () {
  //       fields.each(function (index, field) {
  //         localStorage.removeItem(keyFor(field));
  //       });
  //     },
  //     saveField = function () {
  //       console.log($(this).prop('type'));
  //       if ($(this).prop('type') == 'checkbox') {
  //         localStorage.setItem(keyFor(this), $(this).prop('checked'));
  //       } else {
  //         localStorage.setItem(keyFor(this), $(this).val());
  //       }

  //     },
  //     recoverField = function (index, field) {
  //       console.log(field.prop('type'));
  //       var value = localStorage.getItem(keyFor(field));
  //       if (value) {
  //         $(field).val(value);
  //       }
  //     };

  //   form.on("submit", clearFields);
  //   fields.on("change", saveField).each(recoverField);
  // };

  /**
   * masks
   */
  $('.phone_us').mask('(000) 000-0000');
  $(".zip_code").mask("00000-0000");
  $(".employer_identification_number").mask("00-0000000", {
    placeholder: "##-#######",
  });
  $(".social_security_number").mask("000-00-0000", {
    placeholder: "###-##-####",
  });
  $(".year").mask("ABCD", {
    translation: {
      A: { pattern: /[1-2]/ },
      B: { pattern: /[0-9]/ },
      C: { pattern: /[0-9]/ },
      D: { pattern: /[0-9]/ },
    },
  });

  var initMaster = {
    subscribe: function () {
      $("#btn_subscribe").on("click", function (e) {
        e.preventDefault();
        let _this = $(this);
        _this.prop("disabled", true);
        let form = _this.closest("form");
        let action = form.attr("action");
        let input = form.find("input");
        let email = input.val();
        if (email && validateEmail(email)) {
          $.ajax({
            url: action,
            type: "POST",
            data: { email: email },
          })
            .done(function (res) {
              alert(res.message);
              input.val("");
            })
            .fail(function () {
              alert("Something went wrong!");
              _this.prop("disabled", false);
            });
        } else {
          alert("Email invalid!");
          _this.prop("disabled", false);
        }
        return false;
      });
    },
  };

  initMaster.subscribe();
  $(function () {
    $('[data-toggle="popover"]').popover();
  });
});
function getLanguageCurrent() {
  return GET_LANGUAGE_CURRENT;
}
