/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin-js.js":
/*!**********************************!*\
  !*** ./resources/js/admin-js.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  function getUsers() {
    $.get('/admin/users', function (data) {
      var output = [];
      $.each(data.users, function (i, e) {
        output += '<tr class="media-user js-user-del' + e.id + '"><td>' + e.first_name + '</td><td>' + e.last_name + '</td><td>' + e.email + '</td><td>' + e.profile.job_title.name + '</td><td class="user-status-dot"><label class="switch"><input class="check-slider "data-id=' + e.id + ' name="chk-box" id="chk-box" value="1" type="checkbox" ' + (e.active === 1 ? "checked" : "") + ' ><span class="slider round"></span></label>' + '</td><td><button id="' + e.id + '" class="admin-btn js-edit-user" data-id=' + e.id + '>Edit</button>' + ' ' + '<button class="admin-btn" id="delete-user" data-id=' + e.id + '>Delete</button></td></tr>';
      });
      $('.js-admins-list').append(output);
      $(".js-edit-user").click(editUser);

      function editUser() {
        id = $(this).attr('id');
        $.get('/admin/users/' + id, function (data) {
          $('.js-edit-fname').val(data.user.first_name);
          $('.js-edit-lname').val(data.user.last_name);
          $('.js-edit-mail').val(data.user.email);
          $('#update-job-title').val(data.user.profile.job_title_id);
        });
        $('#hidden_user_id').val(id);
        $(".js-user-modal").show();
      }

      $("#form").on('submit', function (e) {
        e.preventDefault();
        var form_data = new FormData();
        form_data.append('first_name', $('#first-name').val());
        form_data.append('last_name', $('#last-name').val());
        form_data.append('email', $('#email').val());
        form_data.append('password', $('#password').val());
        form_data.append('password_confirmation', $('#password-confirm').val());
        form_data.append('company_id', $('#company-id').val());
        form_data.append('job_title_id', $('#job-title').val());
        form_data.append('picture', $('#image')[0].files[0]); // debugger;

        $.ajax({
          url: "/admin/users",
          type: "post",
          // Type of request to be send, called as method
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          success: function success(data) // A function to be called if request succeeds
          {
            console.log(data.request);
            alert('User added');
            $(".js-admins-list").empty().append(getUsers);
            $('.js-edit-form input').val('');
            $(".js-statistics").load(location.href + " .js-statistics>*", "");
          },
          error: function error(data) {
            if (data.responseJSON.errors.first_name) {
              $('.js-error-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
            }

            if (data.responseJSON.errors.last_name) {
              $('.js-error-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
            }

            if (data.responseJSON.errors.email) {
              $('.js-error-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
            }

            if (data.responseJSON.errors.password) {
              $('.js-error-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
            }

            if (data.responseJSON.errors.picture) {
              $('.js-error-picture').slideDown().text(data.responseJSON.errors.picture[0]).fadeIn(3000).delay(3000).fadeOut("slow");
            }
          }
        }).done(function (data) {});
      });
    });
  }

  getUsers(); // UPDATE USER

  $('.js-update-user').click(updateUser);

  function updateUser() {
    id = $('#hidden_user_id').val();
    first_name = $('.js-edit-fname').val();
    last_name = $('.js-edit-lname').val();
    email = $('.js-edit-mail').val();
    job_title_id = $('#update-job-title').val();
    $.ajax({
      url: "/admin/users/" + id,
      type: 'PUT',
      data: {
        first_name: first_name,
        last_name: last_name,
        email: email,
        job_title_id: job_title_id
      },
      error: function error(data) {
        if (data.responseJSON.errors.first_name) {
          $('.js-error-edit-user-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
        }

        if (data.responseJSON.errors.last_name) {
          $('.js-error-edit-user-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
        }

        if (data.responseJSON.errors.email) {
          $('.js-error-edit-user-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
        }
      }
    }).done(alert("User is updated"), $(".js-user-modal").hide(), $('.js-admins-list').empty().append(getUsers));
  } // UPDATE USER PASSWORD


  $('.js-user-update-password').click(updateUserPassword);

  function updateUserPassword() {
    id = $('#hidden_user_id').val();
    password = $('#password1').val();
    password_confirmation = $('#password-confirm1').val();
    alert(id);
    alert(password);
    alert(password_confirmation);
    $.ajax({
      url: "/admin/users/" + id + "/update/password",
      type: 'PUT',
      data: {
        password: password,
        password_confirmation: password_confirmation
      },
      error: function error(data) {
        if (data.responseJSON.errors.password) {
          $('.js-error-edit-user-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
        }
      }
    }).done(alert("Password is updated"));
  } //ADD USER MODAL BUTTON


  $('.js-show-new-user').click(showNew);

  function showNew() {
    var ix = $(this).index();
    $('.js-admin-modal').toggle(ix === '1' ? '0' : '1');
    $('.js-interactive-text').toggle(ix === '0' ? '1' : '0');

    if ($(this).text() == "New user") {
      $(this).text("Close");
    } else {
      $(this).text("New user");
    }
  } //EDIT FEEDBACK TIME MODAL BUTTON


  $('.js-show-time-update').click(showTime);

  function showTime() {
    var ix = $(this).index();
    $('.js-tab-2').toggle(ix === '1' ? '0' : '1');
    $('.js-feedback-interval').toggle(ix === '0' ? '1' : '0');

    if ($(this).text() == "Edit time") {
      $(this).text("Close");
    } else {
      $(this).text("Edit time");
    }
  } //SHOW STATS BUTTON


  $('.js-stats').click(showStats);

  function showStats() {
    var ix = $(this).index();
    $('.js-statistics').toggle(ix === '1' ? '0' : '1');
    $('.js-stats-info').toggle(ix === '0' ? '1' : '0');

    if ($(this).text() == "Statistics") {
      $(this).text("Close");
    } else {
      $(this).text("Statistics");
    }
  } //MOBILE VIEW TEST


  function testScreen() {
    var width = window.innerWidth;

    if (width < 430) {
      var mediaUsers = function mediaUsers() {
        $('.js-admin-modal').toggle();
        $('.js-interactive-text').toggle();
      };

      var mediaTime = function mediaTime() {
        $('.js-tab-2').toggle();
        $('.js-feedback-interval').toggle();
      };

      var mediaStats = function mediaStats() {
        $('.js-statistics').toggle();
        $('.js-stats-info').toggle();
      };

      $('.js-media-show').click(mediaUsers);
      ;
      $('.js-media-time').click(mediaTime);
      ;
      $('.js-media-stats').click(mediaStats);
      ;
    }
  }

  testScreen(); // DELETE USER

  $(document).on('click', '#delete-user', function () {
    var id = $(this).data('id');
    $.ajax({
      url: "/admin/users/" + id,
      type: 'DELETE',
      data: {
        id: id
      }
    }).done(function (data) {
      alert(data.success);
      $(".js-statistics").load(location.href + " .js-statistics>*", "");
      $(".js-user-del" + id).remove();
    });
  }); // UPDATE COMPANY FEEDBACK DURATION

  $(document).on('click', '.admin-btn-feedback-duration', function () {
    var id = $(this).data('id');
    var feedback_duration_id = $('#feedback-time').val();
    $.ajax({
      url: "/admin/companies/" + id,
      type: 'PUT',
      data: {
        feedback_duration_id: feedback_duration_id
      }
    }).done(function (data) {
      alert('Feedback time is updated.');
    });
  });
  $('.js-edit-user-close').click(closeEdit);

  function closeEdit() {
    $(".js-user-modal").hide();
  } // change user status


  $(document).on("change", "input[name='chk-box']", function () {
    var id = $(this).data('id');
    $.ajax({
      url: '/admin/users/' + id + '/update/status',
      type: 'put',
      data: {
        id: id
      }
    }).done(function (data) {
      $(".js-statistics").load(location.href + " .js-statistics>*", "");
      alert(data.success);
    });
  });
});

/***/ }),

/***/ "./resources/js/admin-notifications-js.js":
/*!************************************************!*\
  !*** ./resources/js/admin-notifications-js.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // send notification to all users
  $('#send').click(function () {
    var message = $('#message').val();
    $.post('/admin/notification/send', {
      message: message
    }).done(function (data) {
      console.log(data.request);
    });
  });
});

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// require('./bootstrap');
__webpack_require__(/*! ./admin-notifications-js */ "./resources/js/admin-notifications-js.js");

__webpack_require__(/*! ./admin-js */ "./resources/js/admin-js.js");

__webpack_require__(/*! ./main-js */ "./resources/js/main-js.js");

__webpack_require__(/*! ./company-list */ "./resources/js/company-list.js");

__webpack_require__(/*! ./job-titles */ "./resources/js/job-titles.js");

__webpack_require__(/*! ./superadmin-js */ "./resources/js/superadmin-js.js");

/***/ }),

/***/ "./resources/js/company-list.js":
/*!**************************************!*\
  !*** ./resources/js/company-list.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //GET ALL COMPANY
  function getCompany() {
    $.get('/superadmin/companies', function (data) {
      var output = [];
      data.companies.forEach(function (e) {
        output += '<p><span style="margin:auto 0; margin-right:10px">' + e.name + '</span>' + (e.active === 1 ? '<span title="active company"class="dot"></span>' : '<span title="Inactive company" class="dot-red"></span>') + '<button data-id="' + e.id + '" class="delete-company super-admin-btn" name="delete-company">DEL</button>' + '<i style="margin:auto 0" class="add fas fa-plus-circle js-super-show" data-id="' + e.id + '"></i>' + '<span class="hide js-super-hide' + e.id + '"><button data-id="' + e.id + '"class="edit-company super-admin-btn" name="edit-company">Update</button><input data-id="' + e.id + '"class="js-edit-input-company-name' + e.id + '" value="' + e.name + '">' + '<input class="js-edit-company-name' + e.id + 'name="active" id="active-' + e.id + '" type="checkbox"' + (e.active === 1 ? "checked" : "") + ">" + '</span><br><span class="hidden js-error-edit-company-name' + e.id + '"><br><br></span></p>';
      });
      $('.js-companies').append(output);
    });
  }

  getCompany(); //ADD COMPANY

  $('.js-add-company-btn').click(addCompany);

  function addCompany() {
    var name = $('.js-company-name').val();
    $.post('/superadmin/companies', {
      name: name
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-admin-company-name').slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-companies').empty().append(getCompany);
      $('#company-id').append('<option value="' + data.company.id + '">' + name + '</option>');
      $('.js-company').val("");
    });
  } //DELETE COMPANY


  $(document).on('click', '.delete-company', function () {
    var id = $(this).data('id');
    $.ajax({
      url: "/superadmin/companies/" + id + "/delete",
      type: 'DELETE',
      data: {
        id: id
      }
    }).done(function (data) {
      $('.js-companies').empty().append(getCompany);
      $("#company-id option[value='" + id + "']").remove();
    });
  }); //UPDATE COMPANY

  $(document).on('click', '.edit-company', function () {
    var id = $(this).data('id');
    var active = '';
    var name = $('.js-edit-input-company-name' + id).val();

    if (document.getElementById('active-' + id).checked) {
      active = 1;
    } else {
      active = 0;
    }

    $.ajax({
      url: "/superadmin/companies/" + id + "/update",
      type: 'PUT',
      data: {
        name: name,
        active: active
      }
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-error-edit-company-name' + id).slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-companies').empty().append(getCompany);
      $("#company-id option[value='" + id + "']").remove();
      $('#company-id').append('<option value="' + id + '">' + name + '</option>');
    });
  });
});

/***/ }),

/***/ "./resources/js/job-titles.js":
/*!************************************!*\
  !*** ./resources/js/job-titles.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  function getJobTitles() {
    $.get('/superadmin/job-titles', function (data) {
      var output = [];
      data.positions.forEach(function (e) {
        output += '<p class="media-list">' + e.name + '<button data-id="' + e.id + '" class="delete-position super-admin-btn" name="delete-position">DEL</button>' + '<i style="margin:auto 0" class="add fas fa-plus-circle js-job-show" data-id="' + e.id + '"></i>' + '<span class="js-job-hide' + e.id + ' hide"><button data-id="' + e.id + '"class="edit-position super-admin-btn" id="edit-position">Update</button>' + '<input type="text" name="edit-position' + e.id + '" id="edit-position' + e.id + '" data-id="' + e.id + '"class="js-edit-input' + e.id + '" placeholder="Update job title">' + '</span><br><span class="hidden js-edit-job-title-name' + e.id + '"><br><br></span></p>';
      });
      $('.js-positions').append(output);
    });
  }

  getJobTitles(); // Add job

  $('.js-add-position-btn').click(addJobTitle);

  function addJobTitle() {
    $.post('/superadmin/job-titles', {
      name: $('[name="position-name"]').val()
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-admin-job-title-name').slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-positions').empty().append(getJobTitles);
      $('.js-position').val("");
    });
  } // Update job title


  $(document).on('click', '.edit-position', function () {
    var id = $(this).data('id');
    var name = $('#edit-position' + id).val();
    $.ajax({
      url: "/superadmin/job-titles/" + id,
      type: 'PUT',
      data: {
        name: name
      }
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-edit-job-title-name' + id).slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-positions').empty().append(getJobTitles);
    });
  }); // Delete job title

  $(document).on('click', '.delete-position', function () {
    var id = $(this).data('id');
    $.ajax({
      url: "/superadmin/job-titles/" + id,
      type: 'DELETE',
      data: {
        id: id
      }
    }).done(function (data) {
      $('.js-positions').empty().append(getJobTitles);
    });
  }); //Search positions

  $(".search-position").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".js-positions p").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  }); //Update job

  $(document).on('click', '.js-job-show', function () {
    var id = $(this).data('id');
    var field = $('.js-job-hide' + id);
    field.toggle();
    $(this).toggleClass('fa-plus-circle fa-minus-circle');
  });
});

/***/ }),

/***/ "./resources/js/main-js.js":
/*!*********************************!*\
  !*** ./resources/js/main-js.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //Log in input animation
  $(".js-e-mail").change(function () {
    $(".e-mail").css("border-color", "#ec1940");
    $(".js-mail").toggle();
  });
  $(".js-password").change(function () {
    $(".password").css("border-color", "#ec1940");
    $(".js-pass").toggle();
  });
  $(".js-search").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".list li").filter(function () {
      $(this).toggle($(this).text().toLocaleLowerCase().indexOf(value) > -1);
    });
  }); //Search teammate input

  $(".js-search").before("<i class='fas fasa js-live-search'>&#xf002;</i>");
  $(".js-search").attr('spellcheck', false);
  $(".write-feedback").attr('spellcheck', false);
  var $inputs = $(".js-search");
  $inputs.on("input", function () {
    var $filled = $inputs.filter(function () {
      return this.value.trim().length > 0;
    });
    $('.js-live-search').toggleClass('js-filled', $filled.length > 0);
  });
  $('.list li').click(getUser);
  $('.js-comments').click(getComments);

  function getComments() {
    $('.comments').slideToggle('500');
    $('.btn-container').find('i').toggleClass('fa-chevron-down fa-chevron-up');
  }

  $('.js-accepted').hide();

  function getUser() {
    // e.preventDefault();
    var id = $(this).attr('data-userId');
    $('.js-write' + id).blur(function () {
      if (!$(this).val()) {
        $(this).removeClass("written");
      } else {
        $(this).addClass("written");
      }

      if (!$('.js-write' + id).val()) {
        $('.js-hide' + id).addClass("hide");
      } else {
        $('.js-hide' + id).removeClass("hide");
      }
    });
    $('.js-write-two' + id).blur(function () {
      if (!$(this).val()) {
        $(this).removeClass("written");
      } else {
        $(this).addClass("written");
      }

      if (!$('.js-write-two' + id).val()) {
        $('.js-hide-2' + id).addClass("hide");
      } else {
        $('.js-hide-2' + id).removeClass("hide");
      }
    });
    $('.js-close' + id).click(closeFeedback);

    function closeFeedback() {
      $('.modal' + id).hide();
      $('.js-no-selected').show();
    }

    $.get('/feedback/user/' + id, {
      success: function success() {
        $('.modal').css('display', 'none');
        $('.modal' + id).show();
        $('.js-no-selected').hide();
        $('.js-accepted').hide();
      }
    });
  }

  var star = $('.star-rating').text();
  $('.star-rating').html(getStars(star));

  function getStars(star) {
    star = Math.round(star * 2) / 2;
    var output = [];

    for (var i = star; i >= 1; i--) {
      output.push('<i class="fa fa-star"  style="color: #ec1940;"></i>&nbsp;');
    }

    if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: #ec1940;"></i>&nbsp;');

    for (var _i = 5 - star; _i >= 1; _i--) {
      output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: lightgray;"></i>&nbsp;');
    }

    return output.join('');
  }

  $.fn.stars = function () {
    return $(this).each(function () {
      var val = parseFloat($(this).html());
      var size = Math.max(0, Math.min(5, val)) * 16;
      var $span = $('<span />').width(size);
      $(this).html($span);
    });
  };

  $(document).ready(function () {
    $('span.stars').stars();
  });
  $('.js-menu-media').click(getAside);

  function getAside() {
    $('.aside-media-view').toggle("slide");
    $('.js-main').toggle("slide");
  }

  var smallScreen = false;
  $(document).ready(function () {
    if ($(window).width() < 426) {
      smallScreen = true;
    }

    $(window).resize(function () {
      if ($(window).width() < 426) {
        smallScreen = true;
      } else {
        smallScreen = false;
      }
    });

    function getTeammates() {
      if (smallScreen) {
        $('.teammate').click(function () {
          $('.aside-media-view').toggle("slide");
          $('.js-main').toggle("slide");
          console.log('getTeammates');
        });
      }
    }

    ;
    getTeammates();
  });
});

/***/ }),

/***/ "./resources/js/superadmin-js.js":
/*!***************************************!*\
  !*** ./resources/js/superadmin-js.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  function getAdmins() {
    $.get('/superadmin/admins', function (data) {
      var output = [];
      data.admins.forEach(function (e) {
        output += '<p>' + e.first_name + ' ' + e.last_name + ' <button data-id="' + e.id + '" class="delete-admin super-admin-btn" name="delete-admin">DEL</button>' + '<button name="edit-admin" id="' + e.id + '" class="super-admin-btn js-edit-modal">EDIT</button></p>';
      });
      $('.js-admins').append(output);
      $(".js-edit-modal").click(editAdmin);

      function editAdmin() {
        id = $(this).attr('id');
        $.get('/superadmin/admins/' + id + '/update', function (data) {
          $('#first_name').val(data.admin.first_name);
          $('#last_name').val(data.admin.last_name);
          $('#admin-email').val(data.admin.email);
        });
        $('#hidden_id').val(id);
        $(".edit-modal").show();
      }
    });
  }

  getAdmins();
  $('.js-edit-admin-btn').click(updateAdmin);

  function updateAdmin() {
    id = $('#hidden_id').val();
    first_name = $('#first_name').val();
    last_name = $('#last_name').val();
    email = $('#admin-email').val();
    $.ajax({
      url: "/superadmin/admins/" + id + "/update",
      type: 'PUT',
      data: {
        first_name: first_name,
        last_name: last_name,
        email: email
      }
    }).fail(function (data) {
      if (data.responseJSON.errors.first_name) {
        $('.js-error-admin-edit-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }

      if (data.responseJSON.errors.last_name) {
        $('.js-error-admin-edit-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }

      if (data.responseJSON.errors.email) {
        $('.js-error-admin-edit-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $(".js-admins").empty().append(getAdmins);
      $(".edit-modal").hide();
    });
  }

  function getSkills() {
    $.get('/superadmin/skills', function (data) {
      var output = [];
      data.skills.forEach(function (e) {
        output += '<p class="media-list"><span style="margin:auto 0; margin-right:10px">' + e.name + '</span>' + '<button data-id="' + e.id + '" class="delete-skill super-admin-btn" name="delete-skill">DEL</button>' + '<i style="margin:auto 0" class="add fas fa-plus-circle js-skill-show" data-id="' + e.id + '"></i>' + '<span class="hide js-skill-hide' + e.id + '"><button data-id="' + e.id + '"class="edit-skill super-admin-btn" name="edit-skill">Update</button><input data-id="' + e.id + '"class="js-edit-skill-name' + e.id + '" placeholder="Update skill name"></span><br><span class="hidden js-edit-skill' + e.id + '"><br><br></span></p>';
      });
      $('.js-skills').append(output);
    });
  }

  getSkills(); //ADD ADMIN

  $('.js-add-admin-btn').click(addAdmin);

  function addAdmin() {
    var first_name = $('#first-name').val();
    var last_name = $('#last-name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirmation = $('#password-confirm').val();
    var company_id = $('#company-id').val();
    $.post('/superadmin/admins', {
      first_name: first_name,
      last_name: last_name,
      email: email,
      password: password,
      password_confirmation: password_confirmation,
      company_id: company_id
    }).fail(function (data) {
      if (data.responseJSON.errors.first_name) {
        $('.js-error-admin-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }

      if (data.responseJSON.errors.last_name) {
        $('.js-error-admin-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }

      if (data.responseJSON.errors.email) {
        $('.js-error-admin-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }

      if (data.responseJSON.errors.password) {
        $('.js-error-admin-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-admins').empty().append(getAdmins);
      $(".superadmin-modal").hide();
      $(".superadmin-modal > input").val("");
    });
  }

  $('.js-add-skill-btn').click(addSkill);

  function addSkill() {
    var name = $('.js-skill').val();
    $.post('/superadmin/skills', {
      name: name
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-add-skill').slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-skill').val('');
      $('.js-skills').empty().append(getSkills);
    });
  }

  $(document).on('click', '.delete-skill', function () {
    var id = $(this).data('id');
    $.ajax({
      url: "/superadmin/skills/" + id + "/delete",
      type: 'DELETE',
      data: {
        id: id
      }
    }).done(function (data) {
      $('.js-skills').empty().append(getSkills);
    });
  });
  $(document).on('click', '.edit-skill', function () {
    var id = $(this).data('id');
    var name = $('.js-edit-skill-name' + id).val();
    $.ajax({
      url: "/superadmin/skills/" + id + "/update",
      type: 'PUT',
      data: {
        name: name
      }
    }).fail(function (data) {
      if (data.responseJSON.errors.name) {
        $('.js-edit-skill' + id).slideDown().text(data.responseJSON.errors.name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(function (data) {
      $('.js-skills').empty().append(getSkills);
    });
  });
  $(document).on('click', '.delete-admin', function () {
    var id = $(this).data('id');
    $.ajax({
      url: "/superadmin/users/" + id + "/delete",
      type: 'DELETE',
      data: {
        id: id
      }
    }).done(function (data) {
      $('.js-admins').empty().append(getAdmins);
    });
  });
  $(document).on('click', '.js-super-show', function () {
    var id = $(this).data('id');
    var field = $('.js-super-hide' + id);
    field.toggle();
    $(this).toggleClass('fa-plus-circle fa-minus-circle');
  });
  $(document).on('click', '.js-skill-show', function () {
    var id = $(this).data('id');
    var field = $('.js-skill-hide' + id);
    field.toggle();
    $(this).toggleClass('fa-plus-circle fa-minus-circle');
  });
  $('#tabs ul li a').click(function () {
    $('#tabs ul li a').removeClass('current-tab');
    $(this).addClass('current-tab');
  }); //Search company

  $(document).ready(function () {
    $(".search-company").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $(".js-companies p").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
  $(".js-superadmin-modal-btn").click(getModal);

  function getModal() {
    $(".superadmin-modal").toggleClass("modal");
    $(this).text(function (i, text) {
      return text === "Close" ? "Add new admin" : "Close";
    });
  }

  $(".js-edit-modal").click(editAdmin);

  function editAdmin() {
    $(".edit-modal").show();
  }

  $('.js-edit-close').click(closeEdit);

  function closeEdit() {
    $('.edit-modal').hide();
  }

  $('.js-update-password').click(updatePassword);

  function updatePassword() {
    id = $('#hidden_id').val();
    password = $('#password1').val();
    password_confirmation = $('#password-confirm1').val();
    $.ajax({
      url: "superadmin/admins/" + id + "/update/password",
      type: 'PUT',
      data: {
        password: password,
        password_confirmation: password_confirmation
      }
    }).fail(function (data) {
      if (data.responseJSON.errors.password) {
        $('.js-error-admin-edit-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
      }
    }).done(alert('updated'), $('#password').val(''), $('#password-confirm').val(''));
  }
});

/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/main.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\feedback-app\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\feedback-app\resources\sass\main.scss */"./resources/sass/main.scss");


/***/ })

/******/ });