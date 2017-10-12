$(function(){

    var crop_divider = 0.5;
    /* 
    * Function: Check whether browser is IE or not.
    */
    var isIE = function(){
          var rv = -1; // Return value assumes failure.
          if (navigator.appName == 'Microsoft Internet Explorer')
          {
            var ua = navigator.userAgent;
            var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null) rv = parseFloat( RegExp.$1 );
          }
          
          return rv == -1 ? false : true;
    };

    /* 
    * Function: Form Avoid Multiple Submission
    */
    $("form").submit(function(){
        $form = $(this);
        setTimeout(function() {
            $form.find('button,a,[type="submit"]').attr('disabled', 'disabled');
        }, 10);
    });

    $(document).on("click", ".autofill, .autofill a, .autofill button", function(){
        setTimeout(function() {
            fillForm();
        }, 500);
    });

    $(document).on('click', '[btn-name]', function(){
        $form = $(this).parents("form");
        $name = $(this).attr('btn-name');
        $val = $(this).val();
        $(this).addClass('btn-loading');
        $form.find("[name='"+$name+"']").val($val);
        $form.submit();
    });

    /* 
    * Function: Submit Form Ajax
    */
    $(document).on("submit","[form-ajax]",function(e){
        e.preventDefault();
        if(typeof nds != "undefined") return false;
        nds = true;
        $form = $(this);
        $url = "";
        $method = "get";

        if($form.attr('action')) $url = $form.attr('action');
        if($form.attr('method')) $method = $form.attr('method');
        $button = $form.find(".btn-loading").html();
        $form.find(".btn-loading").html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');

        /* 
        * Function: Loading.
        */
        var el = $(".form-loading");
        el.block({
            overlayCSS: {
                backgroundColor: '#fff'
            },
            message: '<img src="'+path['images']+'loading.gif" /> Wait a moment...',
            css: {
                border: 'none',
                color: '#333',
                background: 'none'
            }
        });

        $.ajax({
            url : $url,
            type : $method,
            data : $form.serialize(),
            beforeSend : function(){
                $form.find(".error").each(function(){
                    $(this).remove();
                });
                $(".info-message").fadeOut(250);
            },
            error : function(a){
                /* 
                * Function: Clear Submission.
                */
                if(typeof Ladda == "object") Ladda.stopAll();
                $form.find(".btn-loading").html($button);
                el.unblock();
                delete nds;fillForm();
                ajaxInit();
            },
            success : function(resp){
                /* 
                * Function: Get Response.
                */
                try{
                    resp = $.parseJSON(resp);
                }catch(err){
                    /* 
                    * Function: Clear Submission.
                    */
                    if(typeof Ladda == "object") Ladda.stopAll();
                    $form.find(".btn-loading").html($button);
                    el.unblock();
                    delete nds;fillForm();
                    eval(resp);
                }

                /* 
                * Function: Clear Submission.
                */
                if(typeof resp.redirect == "undefined"){
                    if(typeof Ladda == "object") Ladda.stopAll();
                    $form.find(".btn-loading").html($button);
                }
                el.unblock();
                delete nds;fillForm();
                
                /* 
                * Function: Push Url State.
                */
                if(typeof resp.url != "undefined"){
                    history.pushState({}, '', resp.url);
                }

                /* 
                * Function: Table ajax.
                */
                if($form.attr('form-ajax') == "table"){
                    if($form.attr('table')){
                        $($form.attr('table')).html(resp.table);
                    }else{
                        $(".table-ajax").html(resp.table);
                    }
                }
				
				if(typeof resp.count != "undefined"){
                    $(".lbl_count").html(resp.count);
                }
                
                if(typeof resp.filter != "undefined"){
                    $("strong.lbl_filter").html(resp.filter);
                }

                /* 
                * Function: Popup Alert.
                */
                if(typeof resp.pAlert != "undefined"){
                    pAlert(resp.pAlert);
                }

                /* 
                * Function: Info Message.
                */
                if(typeof resp.info != "undefined"){
                    if(typeof resp.noscroll == "undefined") $("html, body").animate({ scrollTop: 0 }, 250);
                    $(".info-message").html(resp.info).fadeIn(250);
                    setTimeout(function(){ $(".info-message").fadeOut(250) }, conf['time_info'])

                    if(typeof resp.redirect != "undefined"){
                        setTimeout(function(){ window.location = resp.redirect; }, 1000)
                    }
                }else{
                    
                    /* 
                    * Function: Redirect.
                    */
                    if(typeof resp.redirect != "undefined"){
                        window.location = resp.redirect;
                    }
                }

                /* 
                * Function: Validation.
                */
                if(typeof resp.validation != "undefined"){
                    $.each(resp.validation, function(key,val){
                        message = $('<span class="error">'+val[0]+'</span>');
                        $('[name="'+key+'"]').after(message);
                    });
                }

                /* 
                * Function: Eval.
                */
                if(typeof resp.eval != "undefined"){
                    eval(resp.eval);
                }
                ajaxInit();
            }
        });
    });

    /* 
    * Function: Pagination Ajax.
    */
    $(document).on('click', 'ul.pagination a', function(e){
        e.preventDefault();
        if(typeof nds != "undefined") return false;
        nds = true;
        $url = $(this).attr('href');

        /* 
        * Function: Loading.
        */
        var el = $(".form-loading");
        el.block({
            overlayCSS: {
                backgroundColor: '#fff'
            },
            message: '<img src="'+path['images']+'loading.gif" /> Wait a moment...',
            css: {
                border: 'none',
                color: '#333',
                background: 'none'
            }
        });

        $.ajax({
            url : $url,
            type : 'get',
            success : function(resp){
                try{
                    resp = $.parseJSON(resp);
                }catch(err){
                    eval(resp);
                }
                
                /* 
                * Function: Clear Submission.
                */
                el.unblock();
                delete nds;fillForm();
                
                /* 
                * Function: Push URL State.
                */
                if(typeof resp.url != "undefined"){
                    history.pushState({}, '', resp.url);
                }

                /* 
                * Function: Table Ajax.
                */
                $(".table-ajax").html(resp.table);
                ajaxInit();
            }
        });
    });

    /* 
    * Function: Delete Ajax.
    */
    $(document).on("click", "[confirm-ajax]", function(e){
        e.preventDefault();
        $id = $(this).attr("id-ajax");
        $url = $(this).attr('href');
        $type = $(this).attr('confirm-ajax');
        if($type == "verify"){
            $title = lang['ttl_verify'];
            $msg = lang['msg_status'];
        }if($type == "status"){
            $title = lang['ttl_change'];
            $msg = lang['msg_status'];
        }
        if($type == "delete"){
            $title = lang['ttl_confirm'];
            $msg = lang['msg_delete'];
        }
        if($type == "send_dc"){
            $title = lang['ttl_send_dc'];
            $msg = lang['msg_send_dc'];
        }
        bootbox.dialog({
            title: $title,
            message: $msg,
            buttons: {
                success: {
                    label: "OK",
                    className: "btn-primary",
                    callback: function() {
                        $.ajax({
                            url : $url,
                            type : "post",
                            data : "id="+$id,
                            success : function(resp){
                                /* 
                                * Function: Info Message.
                                */
                                if(typeof resp.info != "undefined"){
                                    if(typeof resp.noscroll == "undefined") $("html, body").animate({ scrollTop: 0 }, 250);
                                    $(".info-message").html(resp.info).fadeIn(250);
                                    setTimeout(function(){ $(".info-message").fadeOut(250) }, conf['time_info'])

                                    if(typeof resp.redirect != "undefined"){
                                        setTimeout(function(){ window.location = resp.redirect; }, 1000)
                                    }
                                }else{
                                    
                                    /* 
                                    * Function: Redirect.
                                    */
                                    if(typeof resp.redirect != "undefined"){
                                        window.location = resp.redirect;
                                    }
                                }

                                if(typeof resp.eval != "undefined"){
                                    eval(resp.eval);
                                }
                                updateTable();
                            }
                        });
                    }
                },
                cancel: {
                    label: "Cancel",
                    className: "btn-default"
                }
            },
        });
    });

    /* 
    * Function: Image Uploader.
    */
    if($('#uploadBtnSqr').length > 0) {
        var uploaderFileSqr = new plupload.Uploader({
            runtimes : isIE() ? 'flash,html4,html5' : 'html5,html4',
            browse_button : 'uploadBtnSqr',
            container : 'uploaderContainerSqr',
            max_file_size : max_file_size,
            flash_swf_url : path['vendor']+'uploader/plupload.flash.swf',
            url : base_url+'/get/upload?type='+pageTypeSqr,
            filters : [
                {title : "Image files", extensions : allowed_file_type}
            ]
        });
    
        uploaderFileSqr.init();
    
        uploaderFileSqr.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {
                $('#uploaderContainerSqr span#filemsgSqr').html('<span id="' + file.id + '"><img src="'+path['img_icons']+'uploader.gif" alt="Uploading File..." /></span>');
            });
            
            $('#uploaderContainerSqr span#errormsgSqr').remove();
            $('#uploadBtnSqr span').text('Uploading...');
            
            uploaderFileSqr.start();
        });
        
        uploaderFileSqr.bind('Error', function(up, err) {
            $('#uploaderContainerSqr span#errormsgSqr').remove();
            $('#uploaderContainerSqr').append("<span id=\"errormsgSqr\" style=\"color:#FF0000;\">" +
                "Message: " + err.message + 
                (err.file.name > max_file_size ? " ,Max file size is " + max_file_size + " bytes." : "") + 
                (err.file ? ", File: " + err.file.name : "") + 
                "</span>"
            );
    
            up.refresh(); // Reposition Flash/Silverlight
        });
        
        uploaderFileSqr.bind('FileUploaded', function(up, file, resp) {
            var resp = $.parseJSON(resp.response);
            var previewArea = '<img class="img-responsive" alt="Preview Photo" id="previewSqr" src="'+resp.targetfile+'" />';
            
            /* 
            * Function: Image ratio calculation.
            */
            var real_height, real_width, y1, y2, x1, x2;
            var x,y,w,h;
            real_width = resp.width;
            real_height = resp.height;
            image_dpi = resp.dpi;
            ratio_image = real_width / real_height;
            x1 = (real_width * crop_divider) - ((real_width * crop_divider) * crop_divider);
            x2 = (real_width * crop_divider) + ((real_width * crop_divider) * crop_divider);            
            y1 = (real_height * crop_divider) - ((real_height * crop_divider) * crop_divider);
            y2 = (real_height * crop_divider) + ((real_height * crop_divider) * crop_divider);

            $('#uploaderContainerSqr #filemsgSqr').html('');
            $('#JCrop_previewSqr .modal-body').html(previewArea);

            /* 
            * Function: Run Modal.
            */
            $('#JCrop_previewSqr').modal({
                backdrop : false,
                keyboard : false,
            });

            /* 
            * Function: Ratio.
            */
            ratio = 0;
            if(typeof img_ratioSqr != "undefined"){
                ratio = img_ratioSqr;
            }

            /* 
            * Function: J-Crop Initialize.
            */
            $('#previewSqr').Jcrop({
                aspectRatio: ratio,
                setSelect: [ x1, y1, x2, y2],
                onSelect: updateCoords,
                trueSize: [real_width,real_height],
                boxWidth : '100%',
                bgColor: 'transparent'
            });
            
            function updateCoords(c)
            {
                $('#xSqr').val(c.x);
                $('#ySqr').val(c.y);
                $('#wSqr').val(c.w);
                $('#hSqr').val(c.h);
            };

            /* 
            * Function: Cancel J-Crop.
            */
            $(".JC-cancelSqr").click(function(e){
                $('#preview_jcropSqr').fadeOut();
                $('#JCrop_previewSqr').modal('hide');
            });

            /* 
            * Function: Execute J-Crop.
            */
            $(".JC-uploadSqr").click(function(e){
                e.preventDefault();
                x = $('#xSqr').val();
                y = $('#ySqr').val();
                w = $('#wSqr').val();
                h = $('#hSqr').val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"/get/crop",
                    data: "x="+ x +"&y="+ y +"&w="+ w + "&pageType=" + pageTypeSqr +
                         "&h="+ h +"&filename="+ resp.filename +
                         "&real_width=" + real_width +
                         "&real_height=" + real_height,
                    success: function(resp){
                        if(typeof image_preview != "undefined"){
                            var previewImage = '<img class="img_preview img-thumbnail" alt="Preview Photo" src="'+resp.targetfile+'">';
                            $('#uploaderContainer #filemsg').hide().html(previewImage).fadeIn();
                        }else{
                            var previewImage = '<a href="'+resp.targetfile+'" class="live_preview" title="Preview Photo"><img alt="Preview Photo" height="30" src="'+path['img_icons']+'image2.png" /></a>';
                            $('#uploaderContainerSqr #filemsgSqr').hide().html(previewImage).fadeIn();
                            $('a.live_preview').colorbox();
                        }
                        
                        $('#filenameSqr').val(resp.filename);
                        $('#uploadBtnSqr span').text('Update Photo');
                        $('#JCrop_previewSqr').modal('hide');
                    }
                })
            });
        });
    }

    /* 
    * Function: Image Uploader.
    */
    if($('#uploadBtn').length > 0) {
        var uploaderFile = new plupload.Uploader({
            runtimes : isIE() ? 'flash,html4,html5' : 'html5,html4',
            browse_button : 'uploadBtn',
            container : 'uploaderContainer',
            max_file_size : max_file_size,
            flash_swf_url : path['vendor']+'uploader/plupload.flash.swf',
            url : base_url+'/get/upload?type='+pageType,
            filters : [
                {title : "Image files", extensions : allowed_file_type}
            ]
        });
    
        uploaderFile.init();
    
        uploaderFile.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {
                $('#uploaderContainer span#filemsg').html('<span id="' + file.id + '"><img src="'+path['img_icons']+'uploader.gif" alt="Uploading File..." /></span>');
            });
            
            $('#uploaderContainer span#errormsg').remove();
            $('#uploadBtn span').text('Uploading...');
            
            uploaderFile.start();
        });
        
        uploaderFile.bind('Error', function(up, err) {
            $('#uploaderContainer span#errormsg').remove();
            $('#uploaderContainer').append("<span id=\"errormsg\" style=\"color:#FF0000;\">" +
                "Message: " + err.message + 
                (err.file.name > max_file_size ? " ,Max file size is " + max_file_size + " bytes." : "") + 
                (err.file ? ", File: " + err.file.name : "") + 
                "</span>"
            );
    
            up.refresh(); // Reposition Flash/Silverlight
        });
        
        uploaderFile.bind('FileUploaded', function(up, file, resp) {
            var resp = $.parseJSON(resp.response);
            var previewArea = '<img class="img-responsive" alt="Preview Photo" id="preview" src="'+resp.targetfile+'" />';
            
            /* 
            * Function: Image ratio calculation.
            */
            var real_height, real_width, y1, y2, x1, x2;
            var x,y,w,h;
            real_width = resp.width;
            real_height = resp.height;
            image_dpi = resp.dpi;
            ratio_image = real_width / real_height;
            x1 = (real_width * crop_divider) - ((real_width * crop_divider) * crop_divider);
            x2 = (real_width * crop_divider) + ((real_width * crop_divider) * crop_divider);            
            y1 = (real_height * crop_divider) - ((real_height * crop_divider) * crop_divider);
            y2 = (real_height * crop_divider) + ((real_height * crop_divider) * crop_divider);

            $('#uploaderContainer #filemsg').html('');
            $('#JCrop_preview .modal-body').html(previewArea);

            /* 
            * Function: Run Modal.
            */
            $('#JCrop_preview').modal({
                backdrop : false,
                keyboard : false,
            });

            /* 
            * Function: Ratio.
            */
            ratio = 0;
            if(typeof img_ratio != "undefined"){
                ratio = img_ratio;
            }

            /* 
            * Function: J-Crop Initialize.
            */
            $('#preview').Jcrop({
                aspectRatio: ratio,
                setSelect: [ x1, y1, x2, y2],
                onSelect: updateCoords,
                trueSize: [real_width,real_height],
                boxWidth : '100%',
                bgColor: 'transparent'
            });
            
            function updateCoords(c)
            {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            };

            /* 
            * Function: Cancel J-Crop.
            */
            $(".JC-cancel").click(function(e){
                $('#preview_jcrop').fadeOut();
                $('#JCrop_preview').modal('hide');
            });

            /* 
            * Function: Execute J-Crop.
            */
            $(".JC-upload").click(function(e){
                e.preventDefault();
                x = $('#x').val();
                y = $('#y').val();
                w = $('#w').val();
                h = $('#h').val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"/get/crop",
                    data: "x="+ x +"&y="+ y +"&w="+ w + "&pageType=" + pageType +
                         "&h="+ h +"&filename="+ resp.filename +
                         "&real_width=" + real_width +
                         "&real_height=" + real_height,
                    success: function(resp){
                        if(typeof image_preview != "undefined"){
                            var previewImage = '<img class="img_preview img-thumbnail" alt="Preview Photo" src="'+resp.targetfile+'">';
                            $('#uploaderContainer #filemsg').hide().html(previewImage).fadeIn();
                        }else{
                            var previewImage = '<a href="'+resp.targetfile+'" class="live_preview" title="Preview Photo"><img alt="Preview Photo" height="30" src="'+path['img_icons']+'image2.png" /></a>';
                            $('#uploaderContainer #filemsg').hide().html(previewImage).fadeIn();
                            $('a.live_preview').colorbox();
                        }
                        
                        $('#filename').val(resp.filename);
                        $('#uploadBtn span').text('Update Photo');
                        $('#JCrop_preview').modal('hide');
                    }
                })
            });
        });
    }

    /* 
    * Function: Image Uploader EN.
    */
    if($('#uploadBtnEN').length > 0) {
        var uploaderFileEN = new plupload.Uploader({
            runtimes : isIE() ? 'flash,html4,html5' : 'html5,html4',
            browse_button : 'uploadBtnEN',
            container : 'uploaderContainerEN',
            max_file_size : max_file_size,
            flash_swf_url : path['vendor']+'uploader/plupload.flash.swf',
            url : base_url+'/get/upload?type='+pageType,
            filters : [
                {title : "Image files", extensions : allowed_file_type}
            ]
        });
    
        uploaderFileEN.init();
    
        uploaderFileEN.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {
                $('#uploaderContainerEN span#filemsgEN').html('<span id="' + file.id + '"><img src="'+path['img_icons']+'uploader.gif" alt="Uploading File..." /></span>');
            });
            
            $('#uploaderContainerEN span#errormsgEN').remove();
            $('#uploadBtnEN span').text('Uploading...');
            
            uploaderFileEN.start();
        });
        
        uploaderFileEN.bind('Error', function(up, err) {
            $('#uploaderContainerEN span#errormsgEN').remove();
            $('#uploaderContainerEN').append("<span id=\"errormsgEN\" style=\"color:#FF0000;\">" +
                "Message: " + err.message + 
                (err.file.name > max_file_size ? " ,Max file size is " + max_file_size + " bytes." : "") + 
                (err.file ? ", File: " + err.file.name : "") + 
                "</span>"
            );
    
            up.refresh(); // Reposition Flash/Silverlight
        });
        
        uploaderFileEN.bind('FileUploaded', function(up, file, resp) {
            var resp = $.parseJSON(resp.response);
            var previewArea = '<img class="img-responsive" alt="Preview Photo" id="previewEN" src="'+resp.targetfile+'" />';
            
            /* 
            * Function: Image ratio calculation.
            */
            var real_height, real_width, y1, y2, x1, x2;
            var x,y,w,h;
            real_width = resp.width;
            real_height = resp.height;
            image_dpi = resp.dpi;
            ratio_image = real_width / real_height;
            x1 = (real_width * crop_divider) - ((real_width * crop_divider) * crop_divider);
            x2 = (real_width * crop_divider) + ((real_width * crop_divider) * crop_divider);            
            y1 = (real_height * crop_divider) - ((real_height * crop_divider) * crop_divider);
            y2 = (real_height * crop_divider) + ((real_height * crop_divider) * crop_divider);

            $('#uploaderContainerEN #filemsgEN').html('');
            $('#JCrop_previewEN .modal-body').html(previewArea);

            /* 
            * Function: Modal Run.
            */
            $('#JCrop_previewEN').modal({
                backdrop : false,
                keyboard : false,
            });

            /* 
            * Function: Ratio.
            */
            ratio = 0;
            if(typeof img_ratio != "undefined"){
                ratio = img_ratio;
            }

            /* 
            * Function: J-Crop Initialize.
            */
            $('#previewEN').Jcrop({
                aspectRatio: ratio,
                setSelect: [ x1, y1, x2, y2],
                onSelect: updateCoords,
                trueSize: [real_width,real_height],
                boxWidth : '100%',
                bgColor: 'transparent'
            });
            
            function updateCoords(c)
            {
                $('#xEN').val(c.x);
                $('#yEN').val(c.y);
                $('#wEN').val(c.w);
                $('#hEN').val(c.h);
            };

            /* 
            * Function: Cancel J-Crop.
            */
            $(".JC-cancelEN").click(function(e){
                $('#JCrop_previewEN').modal('hide');
            });

            /* 
            * Function: Execute J-Crop.
            */
            $(".JC-uploadEN").click(function(e){
                e.preventDefault();
                x = $('#xEN').val();
                y = $('#yEN').val();
                w = $('#wEN').val();
                h = $('#hEN').val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"/get/crop",
                    data: "x="+ x +"&y="+ y +"&w="+ w + "&pageType=" + pageType +
                         "&h="+ h +"&filename="+ resp.filename +
                         "&real_width=" + real_width +
                         "&real_height=" + real_height + "&langs=en",
                    success: function(resp){
                        
                        if(typeof image_preview != "undefined"){
                            var previewImage = '<img class="img_preview img-thumbnail" alt="Preview Photo" src="'+resp.targetfile+'">';
                            $('#uploaderContainerEN #filemsgEN').hide().html(previewImage).fadeIn();
                        }else{
                            var previewImage = '<a href="'+resp.targetfile+'" class="live_preview" title="Preview Photo"><img alt="Preview Photo" height="30" src="'+path['img_icons']+'image2.png" /></a>';
                            $('#uploaderContainerEN #filemsgEN').hide().html(previewImage).fadeIn();
                            $('a.live_preview').colorbox();
                        }
                        
                                
                        $('#filenameEN').val(resp.filename);
                        $('#uploadBtnEN span').text('Update Photo');
                        $('#JCrop_previewEN').modal('hide');
                    }
                })
            });
        });
    }

    /* 
    * Function: Image Uploader IN.
    */
    if($('#uploadBtnIN').length > 0) {
        var uploaderFileIN = new plupload.Uploader({
            runtimes : isIE() ? 'flash,html4,html5' : 'html5,html4',
            browse_button : 'uploadBtnIN',
            container : 'uploaderContainerIN',
            max_file_size : max_file_size,
            flash_swf_url : path['vendor']+'uploader/plupload.flash.swf',
            url : base_url+'/get/upload?type='+pageType,
            filters : [
                {title : "Image files", extensions : allowed_file_type}
            ]
        });
    
        uploaderFileIN.init();
    
        uploaderFileIN.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {
                $('#uploaderContainerIN span#filemsgIN').html('<span id="' + file.id + '"><img src="'+path['img_icons']+'uploader.gif" alt="Uploading File..." /></span>');
            });
            
            $('#uploaderContainerIN span#errormsgIN').remove();
            $('#uploadBtnIN span').text('Uploading...');
            
            uploaderFileIN.start();
        });
        
        uploaderFileIN.bind('Error', function(up, err) {
            $('#uploaderContainerIN span#errormsgIN').remove();
            $('#uploaderContainerIN').append("<span id=\"errormsgIN\" style=\"color:#FF0000;\">" +
                "Message: " + err.message + 
                (err.file.name > max_file_size ? " ,Max file size is " + max_file_size + " bytes." : "") + 
                (err.file ? ", File: " + err.file.name : "") + 
                "</span>"
            );
    
            up.refresh(); // Reposition Flash/Silverlight
        });
        
        uploaderFileIN.bind('FileUploaded', function(up, file, resp) {
            var resp = $.parseJSON(resp.response);
            var previewArea = '<img class="img-responsive" alt="Preview Photo" id="previewIN" src="'+resp.targetfile+'" />';
            
            /* 
            * Function: Image ratio calculation.
            */
            var real_height, real_width, y1, y2, x1, x2;
            var x,y,w,h;
            real_width = resp.width;
            real_height = resp.height;
            image_dpi = resp.dpi;
            ratio_image = real_width / real_height;
            x1 = (real_width * crop_divider) - ((real_width * crop_divider) * crop_divider);
            x2 = (real_width * crop_divider) + ((real_width * crop_divider) * crop_divider);            
            y1 = (real_height * crop_divider) - ((real_height * crop_divider) * crop_divider);
            y2 = (real_height * crop_divider) + ((real_height * crop_divider) * crop_divider);

            $('#uploaderContainerIN #filemsgIN').html('');
            $('#JCrop_previewIN .modal-body').html(previewArea);

            /* 
            * Function: Run Modal.
            */
            $('#JCrop_previewIN').modal({
                backdrop : false,
                keyboard : false,
            });

            /* 
            * Function: Ratio.
            */
            ratio = 0;
            if(typeof img_ratio != "undefined"){
                ratio = img_ratio;
            }

            /* 
            * Function: J-Crop Initialize.
            */
            $('#previewIN').Jcrop({
                aspectRatio: ratio,
                setSelect: [ x1, y1, x2, y2],
                onSelect: updateCoords,
                trueSize: [real_width,real_height],
                boxWidth : '100%',
                bgColor: 'transparent'
            });
            
            function updateCoords(c)
            {
                $('#xIN').val(c.x);
                $('#yIN').val(c.y);
                $('#wIN').val(c.w);
                $('#hIN').val(c.h);
            };

            /* 
            * Function: Cancel J-Crop.
            */
            $(".JC-cancelIN").click(function(e){
                $('#JCrop_previewIN').modal('hide');
            });

            /* 
            * Function: Execute J-Crop.
            */
            $(".JC-uploadIN").click(function(e){
                e.preventDefault();
                x = $('#xIN').val();
                y = $('#yIN').val();
                w = $('#wIN').val();
                h = $('#hIN').val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"/get/crop",
                    data: "x="+ x +"&y="+ y +"&w="+ w + "&pageType=" + pageType +
                         "&h="+ h +"&filename="+ resp.filename +
                         "&real_width=" + real_width +
                         "&real_height=" + real_height + "&langs=in" ,
                    success: function(resp){

                        if(typeof image_preview != "undefined"){
                            var previewImage = '<img class="img_preview img-thumbnail" alt="Preview Photo" src="'+resp.targetfile+'">';
                            $('#uploaderContainerIN #filemsgIN').hide().html(previewImage).fadeIn();
                        }else{
                            var previewImage = '<a href="'+resp.targetfile+'" class="live_preview" title="Preview Photo"><img alt="Preview Photo" height="30" src="'+path['img_icons']+'image2.png" /></a>';
                            $('#uploaderContainerIN #filemsgIN').hide().html(previewImage).fadeIn();
                            $('a.live_preview').colorbox();
                        }
                                
                        $('#filenameIN').val(resp.filename);
                        $('#uploadBtnIN span').text('Update Photo');
                        $('#JCrop_previewIN').modal('hide');
                    }
                })
            });
        });
    }

    /* 
    * Function: Image Uploader Vacancy Logo.
    */
    if($('#uploadBtnVLogo').length > 0) {
        var uploaderFileVLogo = new plupload.Uploader({
            runtimes : isIE() ? 'flash,html4,html5' : 'html5,html4',
            browse_button : 'uploadBtnVLogo',
            container : 'uploaderContainerVLogo',
            max_file_size : max_file_size,
            flash_swf_url : path['vendor']+'uploader/plupload.flash.swf',
            url : base_url+'/get/upload?type='+pageTypeSqr,
            filters : [
                {title : "Image files", extensions : allowed_file_type}
            ]
        });
    
        uploaderFileVLogo.init();
    
        uploaderFileVLogo.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {
                $('#uploaderContainerVLogo span#filemsgVLogo').html('<span id="' + file.id + '"><img src="'+path['img_icons']+'uploader.gif" alt="Uploading File..." /></span>');
            });
            
            $('#uploaderContainerVLogo span#errormsgVLogo').remove();
            $('#uploadBtnVLogo span').text('Uploading...');
            
            uploaderFileVLogo.start();
        });
        
        uploaderFileVLogo.bind('Error', function(up, err) {
            $('#uploaderContainerVLogo span#errormsgVLogo').remove();
            $('#uploaderContainerVLogo').append("<span id=\"errormsgVLogo\" style=\"color:#FF0000;\">" +
                "Message: " + err.message + 
                (err.file.name > max_file_size ? " ,Max file size is " + max_file_size + " bytes." : "") + 
                (err.file ? ", File: " + err.file.name : "") + 
                "</span>"
            );
    
            up.refresh(); // Reposition Flash/Silverlight
        });
        
        uploaderFileVLogo.bind('FileUploaded', function(up, file, resp) {
            var resp = $.parseJSON(resp.response);
            var previewArea = '<img class="img-responsive" alt="Preview Photo" id="previewVLogo" src="'+resp.targetfile+'" />';
            
            /* 
            * Function: Image ratio calculation.
            */
            var real_height, real_width, y1, y2, x1, x2;
            var x,y,w,h;
            real_width = resp.width;
            real_height = resp.height;
            image_dpi = resp.dpi;
            ratio_image = real_width / real_height;
            x1 = (real_width * crop_divider) - ((real_width * crop_divider) * crop_divider);
            x2 = (real_width * crop_divider) + ((real_width * crop_divider) * crop_divider);            
            y1 = (real_height * crop_divider) - ((real_height * crop_divider) * crop_divider);
            y2 = (real_height * crop_divider) + ((real_height * crop_divider) * crop_divider);

            $('#uploaderContainerVLogo #filemsgVLogo').html('');
            $('#JCrop_previewVLogo .modal-body').html(previewArea);

            /* 
            * Function: Run Modal.
            */
            $('#JCrop_previewVLogo').modal({
                backdrop : false,
                keyboard : false,
            });

            /* 
            * Function: Ratio.
            */
            ratio = 0;
            if(typeof img_ratioSqr != "undefined"){
                ratio = img_ratioSqr;
            }

            /* 
            * Function: J-Crop Initialize.
            */
            $('#previewVLogo').Jcrop({
                aspectRatio: ratio,
                setSelect: [ x1, y1, x2, y2],
                onSelect: updateCoords,
                trueSize: [real_width,real_height],
                boxWidth : '100%',
                bgColor: 'transparent'
            });
            
            function updateCoords(c)
            {
                $('#xVLogo').val(c.x);
                $('#yVLogo').val(c.y);
                $('#wVLogo').val(c.w);
                $('#hVLogo').val(c.h);
            };

            /* 
            * Function: Cancel J-Crop.
            */
            $(".JC-cancelVLogo").click(function(e){
                $('#JCrop_previewVLogo').modal('hide');
            });

            /* 
            * Function: Execute J-Crop.
            */
            $(".JC-uploadVLogo").click(function(e){
                e.preventDefault();
                x = $('#xVLogo').val();
                y = $('#yVLogo').val();
                w = $('#wVLogo').val();
                h = $('#hVLogo').val();
                
                $.ajax({
                    type: "POST",
                    url: base_url+"/get/crop",
                    data: "x="+ x +"&y="+ y +"&w="+ w + "&pageType=" + pageType +
                         "&h="+ h +"&filename="+ resp.filename +
                         "&real_width=" + real_width +
                         "&real_height=" + real_height,
                    success: function(resp){

                        if(typeof image_preview != "undefined"){
                            var previewImage = '<img class="img_preview img-thumbnail" alt="Preview Photo" src="'+resp.targetfile+'">';
                            $('#uploaderContainerVLogo #filemsgVLogo').hide().html(previewImage).fadeIn();
                        }else{
                            var previewImage = '<a href="'+resp.targetfile+'" class="live_preview" title="Preview Photo"><img alt="Preview Photo" height="30" src="'+path['img_icons']+'image2.png" /></a>';
                            $('#uploaderContainerVLogo #filemsgVLogo').hide().html(previewImage).fadeIn();
                            $('a.live_preview').colorbox();
                        }
                                
                        $('#filenameVLogo').val(resp.filename);
                        $('#uploadBtnVLogo span').text('Update Photo');
                        $('#JCrop_previewVLogo').modal('hide');
                    }
                })
            });
        });
    }

    /* 
    * Function: Checked All.
    */
    $(document).on("ifToggled", ".checked_all", function(){
        $form = $(this).parents("form");
        $self = $(this).parent();
        $all_selector = $form.find('.selector');
        if($self.hasClass("checked")){
            $all_selector.iCheck("uncheck");
        }else{
            $all_selector.iCheck("check");
        }
    });

    /* 
    * Function: Content Refresh.
    */
    $(document).on('click', '.do-refresh', function(){ updateTable() });
    $(document).on('click', '[order-link]', function(e){ e.preventDefault(); updateTable($(this).attr("order-link")); });

    ajaxInit();
});


/* 
* Function: Refresh table with Ajax.
*/
function updateTable($url){
    // Loading
    var el = $(".form-loading");
    el.block({
        overlayCSS: {
            backgroundColor: '#fff'
        },
        message: '<img src="'+path['images']+'loading.gif" /> Wait a moment...',
        css: {
            border: 'none',
            color: '#333',
            background: 'none'
        }
    });
    if(!$url) $url = location.href;
    $.ajax({
        url : $url,
        type : 'get',
        success : function(resp){
            try{
                resp = $.parseJSON(resp);
            }catch(err){
                eval(resp);
            }
            el.unblock();
            history.pushState({}, '', $url);
            $(".table-ajax").html(resp.table);
            ajaxInit();
        }
    });
}

/*
* Function : for clear all submission security by remove all button and link 'disabled' attribute
*/
function fillForm(){
    setTimeout(function() {
        $("form").find('button,a,[type="submit"]').removeAttr('disabled');
    }, 50);
}

/*
* Function : Initialize plugin when ajax run
*/
function ajaxInit(){
    /* 
    * Function: Select 2.
    */
    if($.fn.select2 != undefined){
        $(".select2").select2();
    }

    /* 
    * Function: Color box Popup.
    */
    if($.fn.colorbox != undefined){
        $(".colorbox").colorbox();
    }

    /* 
    * Function: Ladda Button Loading.
    */
    if(typeof Ladda == "object"){
        Ladda.bind('.ladda-button');
    }

    /* 
    * Function: All Main.
    */
    Main.runTooltips();
    Main.runPopovers();
    Main.runCustomCheck();
}

/* 
* Function: Function Global.
*/
function info(target, type, msg, callback, time){
    if(typeof time == "undefined") time = 2000;
    $(function(){
        $info = $('<div style="display:none" class="alert alert-'+type+'">'+msg+'</div>')
        $(target).html($info);
        $info.fadeIn(250).delay(time).fadeOut(250);
        if(typeof callback != "undefined"){
            setTimeout(function(){
                callback();
            }, time+500)
        }
    });
}

/* 
* Function: Alert Info.
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

/*
* Function to explode current query string
* How to use:
* getUrlVars() : to get key of query string
* getUrlVars()['name'] : to get value of key
*/

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

Main.init();