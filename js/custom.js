jQuery(document).ready(function ($) {
  $body = $("body");
  var today_d = new Date();
  var max_date = new Date();
  max_date.setDate(today_d.getDate() + 7);
  var min_date = new Date();
  min_date.setDate(today_d.getDate());
  $.datetimepicker.setLocale('en');

  var bmax_date = new Date();
  bmax_date.setDate(today_d.getDate() + 14);
  jQuery('#book_date_borrowed').datetimepicker({
    timepicker: false,
    todayButton: false,
    format: 'd-m-Y',
    startDate: min_date,
    minDate: 0,
    defaultDate: min_date
  });
  jQuery('#book_date_due').datetimepicker({
    timepicker: false,
    format: 'd-m-Y',
    minDate: 0,
    todayButton: false,
    maxDate: bmax_date,
    startDate: max_date,
    defaultDate: max_date
  });

  var AdminLTEOptions = {
    sidebarExpandOnHover: true,
    enableBoxRefresh: true,
    enableBSToppltip: true
  };

  localStorage.setItem("pg_nos", "0");
  $("#loginform").validate({
    rules: {
      log: "required",
      pwd: "required"
    }
  });

  $("#frmUpdateBookDetails").validate({
    rules: {
      selected_book_title: {
        required: true,
        minlength: 2,
        maxlength: 500,
      },
      select_book_price: {
        required: true,
      }
    },
    messages: {

      selected_book_title: {
        minlength: "Book title seems to be invalid.",
        maxlength: "Book title must't consist of more than 150 characters."
      },
      select_book_price: {
        required: "Price is required.",
      }
    }
  });

  jQuery("#slides").slidesjs({
    width: 1108,
    height: 350,
    navigation: {
      active: false,
      effect: "fade"
    },
    pagination: {
      active: false,
      effect: "slide"
    }
  });

  $('#lib_password_form').validate({
    rules: {
      new_pass: {
        required: true,
        minlength: 8,
        maxlength: 15
      },
      confirm_pass: {
        equalTo: "#new_pass"
      }
    },
    messages: {
      new_pass: {
        required: "Password required.",
        minlength: "Your password must consist at least 8 characters",
        maxlength: "Your password must consist no more than 15 characters",
      },
      confirm_pass: {
        equalTo: "Password don't match!"
      },
    }
  });

  $("#upload_profilePic").on('click', function (e) {
    e.preventDefault();
    $("#upload_hidden_file:hidden").trigger('click');
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img_profile_pic')
          .attr('src', e.target.result);

      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#book_qty").numeric();
  $("#book_price").numeric();
  $('#book_add_form').validate({
    rules: {
      book_isbn: {
        required: true,
        minlength: 5,
        maxlength: 20,
      },
      book_title: {
        required: true,
        minlength: 2,
        maxlength: 500,
      },
      book_category: {
        required: true,
        maxlength: 50,
      },
      book_price: {
        required: true,
      },
      book_qty: {
        required: true,
      }
    },
    messages: {
      book_isbn: {
        required: "Isbn is required.",
        minlength: "Isbn should be of min 5 characters.",
        maxlength: "Isbn must consist of no more than 20 characters.",
      },
      book_title: {
        required: "Book title is required.",
        minlength: "Book title seems to be invalid.",
        maxlength: "Book title must't consist of more than 150 characters.",
      },
      book_category: {
        required: "Book category is required.",
        maxlength: "Book consist must't consist of more than 50 characters.",
      },
      book_price: {
        required: "Price is required.",
      },
      book_qty: {
        required: "Minimum 1 Qty is required.",
      }
    }
  });

  jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
  }, "Invalid data found.");

  $('#lib_update_profile_form').validate({
    rules: {
      fname: {
        required: true,
        minlength: 3,
        maxlength: 20,
        lettersonly: true
      },
      lname: {
        required: true,
        minlength: 3,
        maxlength: 20,
        lettersonly: true
      },
      email: {
        email: true,
        required: true,
      },
      phone: {
        required: true,
        minlength: 10,
      },
      address: {
        required: true,
        minlength: 10,
        maxlength: 500,
      },
      city: {
        required: true,
      },
      zip: {
        required: true,
        minlength: 5,
      },
      state: {
        required: true,
      }
    },
    messages: {
      fname: {
        required: "First name is required.",
        minlength: "First name seems to be invalid.",
        maxlength: "First name seems to be invalid.",
        lettersonly: "First name seem to be invalid.",
      },
      lname: {
        required: "Last name is required.",
        minlength: "Last name seems to be invalid.",
        maxlength: "Last name seems to be invalid.",
        lettersonly: "Last name seem to be invalid.",
      },
      email: {
        email: "Email is invalid.",
        required: "Email Id is required.",
      },
      phone: {
        required: "Phone number is required.",
        minlength: "Phone number seems to be invalid.",
      },
      address: {
        required: "Address is required.",
        minlength: "Address seems to be invalid.",
        maxlength: "Address seems to be invalid."
      },
      city: {
        required: "City name is required.",
      },
      zip: {
        required: "Zip code seems to be invalid.",
      },
      state: {
        required: "State is required."
      }
    }
  });

  $('#lib_manage_inst_form_profile').validate({
    rules: {
      inst_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      inst_cont_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
        lettersonly: true
      },
      inst_email: {
        email: true,
        required: true
      },
      inst_phone: {
        required: true,
        minlength: 10,
      },
      inst_address: {
        required: true,
        minlength: 10,
        maxlength: 500,
      },
      inst_city: {
        required: true,
      },
      inst_zip: {
        required: true,
        minlength: 5,
      },
      inst_state: {
        required: true,
      },
      inst_website: {
        url: true,
        required: true,
      }
    },
    messages: {
      inst_name: {
        required: "First name is required.",
        minlength: "Instituion name seems to be invalid.",
        maxlength: "Instituion name seems to be invalid."
      },
      inst_cont_name: {
        required: "Name is required.",
        minlength: "Name seems to be invalid.",
        maxlength: "Name seems to be invalid.",
        lettersonly: "Name seem to be invalid.",
      },
      inst_email: {
        email: "Email is invalid.",
        required: "Email is required."
      },
      inst_phone: {
        required: "Phone number is required.",
        minlength: "Phone number seems to be invalid.",
      },
      inst_address: {
        required: "Address is required.",
        minlength: "Address seems to be invalid.",
        maxlength: "Address seems to be invalid."
      },
      inst_city: {
        required: "City name is required.",
      },
      inst_zip: {
        required: "Zip code seems to be invalid.",
      },
      inst_state: {
        required: "State is required."
      },
      inst_website: {
        url: "Url seems to be invalid.",
        required: "Url is requried."
      }
    }
  });

  $('#addYearsForm').validate({
    inlineFormYear: {
      required: true,
    },
    messages: {
      inlineFormYear: {
        required: "Content is requried."
      }
    }
  });

  $('#addCoursesForm').validate({
    inlineFormCourse: {
      required: true,
    },
    messages: {
      inlineFormCourse: {
        required: "Content is requried."
      }
    }
  });

  $('#lib_issue_book_form').validate({
    rules: {
      book_no: {
        required: true,
        minlength: 6
      },
      user_id: {
        required: true,
        minlength: 1
      },
      book_date_borrowed: {
        required: true
      },
      book_date_due: {
        required: true,
      },
    },
    messages: {
      book_no: {
        required: "Book ID is required.",
        minlength: "Book ID seems to be invalid."
      },
      user_id: {
        required: "User ID is required.",
        minlength: "User ID seems to be invalid.",
      },
      book_date_borrowed: {
        required: "Date of issue is required."
      },
      book_date_due: {
        required: "Date of return is required.",
      }
    }
  });

  $('#lib_manage_other_seting').validate({
    rules: {
      number_of_rows: {
        required: true,
      },
      people_to_approve: {
        required: true
      },
    },
    messages: {}
  });

  $('#lib_request_book').validate({
    rules: {
      book_name: {
        required: true,
        minlength: 10
      },
      book_url: {
        url: true
      },
      note_on_book: {
        required: true,
        minlength: 50
      }
    },
    messages: {
      book_name: {
        required: "Book Name is required.",
        minlength: "Book Name seems to be invalid.Min 10 characters."
      },
      note_on_book: {
        required: "Note is required.",
        minlength: "Notes needs to be more than 50 characters."
      }
    }
  });

  $('#lib_edit_user_profile_form').validate({
    rules: {
      first_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      last_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      email: {
        email: true,
        required: true
      },
      phone: {
        required: true,
        minlength: 10,
      },
      address: {
        required: true,
        minlength: 10,
        maxlength: 500,
      },
      course_name: {
        required: true
      },
      year_name: {
        required: true
      },
      city: {
        required: true,
      },
      zip: {
        required: true,
        minlength: 5,
      },
      state: {
        required: true,
      }

    },
    messages: {
      first_name: {
        required: "First name is required.",
        minlength: "First name seems to be invalid.",
        maxlength: "First name seems to be invalid."
      },
      last_name: {
        required: "Last name is required.",
        minlength: "Last name seems to be invalid.",
        maxlength: "Last name seems to be invalid."
      },
      email: {
        email: "Email is invalid.",
        required: "Email is required."
      },
      phone: {
        required: "Phone number is required.",
        minlength: "Phone number seems to be invalid.",
      },
      address: {
        required: "Address is required.",
        minlength: "Address seems to be invalid.",
        maxlength: "Address seems to be invalid."
      },
      city: {
        required: "City name is required.",
      },
      zip: {
        required: "Zip code seems to be invalid.",
      },
      state: {
        required: "State is required."
      },
      course_name: {
        required: "Course name is required."
      },
      year_name: {
        required: "Course Year is required."
      },

    }
  });

  $('#lib_add_user_profile_form').validate({
    rules: {
      first_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      last_name: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      email: {
        email: true,
        required: true
      },
      phone: {
        required: true,
        minlength: 10,
      },
      address: {
        required: true,
        minlength: 10,
        maxlength: 500,
      },
      course_name: {
        required: true
      },
      year_name: {
        required: true
      },
      city: {
        required: true,
      },
      zip: {
        required: true,
        minlength: 5,
      },
      state: {
        required: true,
      }

    },
    messages: {
      first_name: {
        required: "First name is required.",
        minlength: "First name seems to be invalid.",
        maxlength: "First name seems to be invalid."
      },
      last_name: {
        required: "Last name is required.",
        minlength: "Last name seems to be invalid.",
        maxlength: "Last name seems to be invalid."
      },
      email: {
        email: "Email is invalid.",
        required: "Email is required."
      },
      phone: {
        required: "Phone number is required.",
        minlength: "Phone number seems to be invalid.",
      },
      address: {
        required: "Address is required.",
        minlength: "Address seems to be invalid.",
        maxlength: "Address seems to be invalid."
      },
      city: {
        required: "City name is required.",
      },
      zip: {
        required: "Zip code seems to be invalid.",
      },
      state: {
        required: "State is required."
      },
      course_name: {
        required: "Course name is required."
      },
      year_name: {
        required: "Course Year is required."
      },

    }
  });


  $.fn.pageMe = function (opts) {
    var $this = this,
      defaults = {
        activeColor: 'blue',
        perPage: 10,
        showPrevNext: false,
        nextText: '',
        prevText: '',
        hidePageNumbers: false
      },
      settings = $.extend(defaults, opts);

    var listElement = $this;
    var perPage = settings.perPage;
    var children = listElement.children();
    var pager = $('.pager');

    if (typeof settings.childSelector != "undefined") {
      children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector != "undefined") {
      pager = $(settings.pagerSelector);
    }

    var numItems = children.size();
    var numPages = Math.ceil(numItems / perPage);

    $("#total_reg").html(numItems + " Entries In Total");

    pager.data("curr", 0);

    if (settings.showPrevNext) {
      $('<li><a href="#" class="prev_link" title="' + settings.prevText + '"><i class="material-icons">chevron_left</i></a></li>').appendTo(pager);
    }

    var curr = 0;
    while (numPages > curr && (settings.hidePageNumbers == false)) {
      $('<li class="waves-effect"><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
      curr++;
    }

    if (settings.showPrevNext) {
      $('<li><a href="#" class="next_link"  title="' + settings.nextText + '"><i class="material-icons">chevron_right</i></a></li>').appendTo(pager);
    }

    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages <= 1) {
      pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active " + settings.activeColor);

    children.hide();
    children.slice(0, perPage).show();

    pager.find('li .page_link').click(function () {
      var clickedPage = $(this).html().valueOf() - 1;
      goTo(clickedPage, perPage);
      return false;
    });
    pager.find('li .prev_link').click(function () {
      previous();
      return false;
    });
    pager.find('li .next_link').click(function () {
      next();
      return false;
    });

    function previous() {
      var goToPage = parseInt(pager.data("curr")) - 1;
      goTo(goToPage);
    }

    function next() {
      goToPage = parseInt(pager.data("curr")) + 1;
      goTo(goToPage);
    }

    function goTo(page) {
      var startAt = page * perPage,
        endOn = startAt + perPage;

      children.css('display', 'none').slice(startAt, endOn).show();

      if (page >= 1) {
        pager.find('.prev_link').show();
      }
      else {
        pager.find('.prev_link').hide();
      }

      if (page < (numPages - 1)) {
        pager.find('.next_link').show();
      }
      else {
        pager.find('.next_link').hide();
      }

      pager.data("curr", page);
      pager.children().removeClass("active " + settings.activeColor);
      pager.children().eq(page + 1).addClass("active " + settings.activeColor);

    }
  };
  $('.confirmation').on('click', function () {
    return confirm('Are you sure?');
  });


});
