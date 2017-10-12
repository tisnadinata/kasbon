
function mobileAndTabletcheck() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

$(window).load(function() {
    setTimeout(function(){
        pathname = location.pathname.replace('/en', '').replace('/id', '');
        if(pathname == "/work"){
            $("html,body").scrollTop($("#work").offset().top);   
        }
        if(pathname == "/fees"){
            $("html,body").scrollTop($("#fees").offset().top);   
        }
    }, 100);
});

// Delay function
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

$(function(){
/*
* Function : auto current section active primary-menu highlight when scroll down
*/
    $(document).scroll(function() {
        if($("#wrapper > #about").length){
            $about = $("#wrapper > #about").offset().top;
            $work = $("#wrapper > #work").offset().top;
            $fees = $("#wrapper > #fees").offset().top - 40;

            $("#primary-menu ul > li").removeClass("current");
            if($(this).scrollTop() >= $fees){
                $("#primary-menu [data-href='fees']").parent().addClass("current");
            }else if($(this).scrollTop() >= $work){
                $("#primary-menu [data-href='work']").parent().addClass("current");
            }else{
                $("#primary-menu [data-href='about']").parent().addClass("current");
            }
        }
    });
});

$(function(){
    // $("#vPrincipal").click(function(){
    //     app.emit('app', { notif : 'New Applicant'});
    // });

/*
* Function : Avoid Form Multiple Submission by disable all button, link and submission button after run form submission
*/
    $("form").submit(function(){
        $form = $(this);
        setTimeout(function() {
            $form.find('button,a,[type="submit"]').attr('disabled', 'disabled');
            var $valid = $form.valid();
            if(!$valid){
                if(typeof Ladda == "object") Ladda.stopAll();
                fillForm();
            }
        }, 10);
    });

    // Navigation Responsive
    $("#page-submenu-trigger").click(function(){
       $('.header_landing, .header_page').toggleClass('nav_open');
    });

/*
* Function : Flip animation video how it works
*/
    $('.play-btn').click(function(){
        mixpanel.track("How it works video play");
        $flipEl = $(this).parents('.flip-video');
        $youtubeEl = $flipEl.find('.card .youtube');
        $youtube_id = $youtubeEl.attr("youtube-id");
        $api = "https://www.youtube.com/embed/"+$youtube_id+"/?showinfo=0&modestbranding=1&controls=0&autoplay=1&rel=0";
        $flipEl.find('.card .youtube').attr('src', $api);
        $flipEl.find('.card').addClass('flipped');
        return false;
    });

/*
* Function : Ajax form submission
* Target : form that has 'form-ajax' atribute
* Method : default method is POST, can be changed with 'method' attribute
*/
    $(document).on("submit","[form-ajax]",function(e){
        e.preventDefault();
        // nds is no double submission, create nds variable after this function call
        if(typeof nds != "undefined") return false;
        nds = true;
        $form = $(this);
        $url = "";
        // Default POST Method
        $method = "post";

        /*
        * Getting ajax url from 'action' attribute
        * Getting ajax url from 'method' attribute
        */
        if($form.attr('action')) $url = $form.attr('action');
        if($form.attr('method')) $method = $form.attr('method');
        
        /*
        * run loading button if button submit has 'btn-loading' class
        */
        $button = $form.find(".btn-loading").html();
        $form.find(".btn-loading").html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
        
        // Run ajax submission
        $.ajax({
            url : $url,
            type : $method,
            data : $form.serialize(),
            beforeSend : function(){
                // Remove all element with 'error' class
                $form.find(".error").each(function(){
                    $(this).remove();
                });
            },
            error : function(a){
                // Clear Submission
                if(typeof Ladda == "object") Ladda.stopAll();
                $form.find(".btn-loading").html($button);
                delete nds;fillForm();
            },
            success : function(resp){
                try{
                    // Parse response string to json
                    $.parseJSON(resp);
                }catch(err){
                    // if not json format then eval this response
                    eval(resp);
                }

                /* Create Eval javascript */
                if(typeof resp.eval != "undefined"){
                    eval(resp.eval);
                }
                
                // Clear Submission
                if(typeof Ladda == "object") Ladda.stopAll();
                if(typeof resp.redirect == "undefined") $form.find(".btn-loading").html($button);
                if($form.attr('loading')) $("#proccess").modal('hide');
                delete nds;fillForm();
                
                /* Delay Default */
                if(typeof resp.delay != "undefined" && resp.delay == true){
                    resp.delay = conf['time_info'];
                }

                /* Push Url State */
                if(typeof resp.url != "undefined"){
                    history.pushState({}, '', resp.url);
                }

                /* Info Message */
                if(typeof resp.info != "undefined"){
                    $info = $(resp.target).hide().html(resp.info).fadeIn(300);
                    if(typeof resp.delay != "undefined"){
                        setTimeout(function(){$info.fadeOut(300)}, resp.delay);
                    }
                }

                /* Popup Alert */
                if(typeof resp.pAlert != "undefined"){
                    pAlert(resp.pAlert);
                }

                /* Popup Alert */
                if(typeof resp.pAlert2 != "undefined"){
                    pAlert2(resp.pAlert2);
                }

                /* Popup Confirm */
                if(typeof resp.pConfirm != "undefined"){
                    pConfirm(resp.pConfirm);
                }

                /* Validation */
                if(typeof resp.validation != "undefined"){
                    $.each(resp.validation, function(key,val){
                        message = $('<span class="error">'+val[0]+'</span>');
                        $('[name="'+key+'"]').after(message);
                    });
                }

                /* Redirect */
                if(typeof resp.redirect != "undefined"){
                    if(typeof resp.delay != "undefined"){
                        setTimeout(function(){
                            window.location = resp.redirect;
                        }, resp.delay);
                    }else{
                        window.location = resp.redirect;
                    }
                }
            }
        });
    });
});

/*
* Function : for clear all submission security by remove all button and link 'disabled' attribute
*/
function fillForm(){
    setTimeout(function() {
        $('button,a,[type="submit"]').removeAttr('disabled');
    }, 10);
}

/* function pAlert
* Function : Create alert dialog with bootstrap modal, this function usually use on ajax submission with json parameter
* library : bootbox modal dialog link : bootboxjs.com
*/
function pAlert($a){
    bootbox.dialog({
      title: $a['title'],
      message: $a['msg'],
      buttons: {
        success: {
          label: "OK",
          className: "btn-second",
          callback: function() {
            if(typeof $a['callback'] != "undefined") eval($a['callback']);
            if(typeof $a['redirect'] != "undefined") window.location = $a['redirect'];
          }
        },
      }
    });
}

function pAlert2($a){
    bootbox.dialog({
      title: $a['title'],
      message: $a['msg'],
      closeButton: false,
      onEscape: function () {
          window.location = $a['redirect'];
      },
      buttons: {
        success: {
          label: "OK",
          className: "btn-second",
          callback: function() {
            if(typeof $a['callback'] != "undefined") eval($a['callback']);
            if(typeof $a['redirect'] != "undefined") window.location = $a['redirect'];
          }
        },
      }
    });
}


/* function pConfirm
* Function : Create confirm dialog with bootstrap modal, this function usually use on ajax submission with json parameter
* library : bootbox modal dialog link : bootboxjs.com
*/
function pConfirm($a){
    bootbox.dialog({
      title: $a['title'],
      message: $a['msg'],
      buttons: {
        success: {
          label: "OK",
          className: "btn-second",
          callback: function() {
            if(typeof $a['callback'] != "undefined") eval($a['callback']);
            if(typeof $a['redirect'] != "undefined") window.location = $a['redirect'];
          }
        },
        cancel: {
          label: "Cancel",
          className: "button-white button-light",
          callback: function() {
            if(typeof $a['callback'] != "undefined") eval($a['cancel']);
          }
        }
      }
    });
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

// Custom Message Jquery Validation
jQuery.extend(jQuery.validator.messages, {
    required: 'Wajib diisi',
    remote: jvalidation['remote'],
    email: 'Masukan email anda dengan benar',
    url: 'Masukan format url anda dengan benar',
    date: jvalidation['date'],
    dateISO: jvalidation['dateISO'],
    number: 'Format harus dalam bentuk angka',
    digits: jvalidation['digits'],
    creditcard: jvalidation['creditcard'],
    equalTo: 'Password Anda tidak Sama',
    accept: jvalidation['accept'],
    maxlength: jQuery.validator.format(jvalidation['maxlength']),
    minlength: 'Minimal harus 6 karakter',
    rangelength: jQuery.validator.format(jvalidation['rangelength']),
    range: jQuery.validator.format(jvalidation['range']),
    max: jQuery.validator.format(jvalidation['max']),
    min: jQuery.validator.format(jvalidation['min'])
});

/*
* Function : to make conditions javascript run on right media query
*/
$(function(){
    function mediaQuery(){
        media = $(this).width();
        if(media <= 1199){

        }
        if(media >= 992 && media <= 1199){

        }
        if(media <= 991){

        }
        if(media <= 991){

        }
        if(media >= 768 && media <= 991){

        }
        if(media <= 767){

        }
        if(media >= 480 && media <= 767){

        }
        if(media <= 479){
            if(typeof wizardTab != "undefined" && wizardTab > 1){
                $("#plan_loan").hide();
            }else{
                $("#plan_loan").show();
            }
        }else{
            $("#plan_loan").show();
        }
    }
    $(window).resize(function(){
        mediaQuery(media)
    });
    mediaQuery();
});

function query2object(query){
    return JSON.parse('{"' + decodeURI(query).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
}