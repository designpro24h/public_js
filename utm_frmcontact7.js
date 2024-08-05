 jQuery.noConflict();
(function ($) {
	// Prevent Multi Submit on all WPCF7 forms
		var disableSubmit = false;

		jQuery('input.wpcf7-submit[type="submit"]').click(function() {

		    jQuery(':input[type="submit"]').attr('value',"Đã gửi");

		    if (disableSubmit == true) {

		        return false;

		    }

		    disableSubmit = true;

		    return true;

		})

		  

		var wpcf7Elm = document.querySelector( '.wpcf7' );

		wpcf7Elm.addEventListener( 'wpcf7_before_send_mail', function( event ) {

		    jQuery(':input[type="submit"]').attr('value',"Gửi thông tin");

		    disableSubmit = false;

		}, false );



		wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {

		    jQuery(':input[type="submit"]').attr('value',"Gửi thông tin")

		    disableSubmit = false;

		}, false );

	//

	// UTM tracking

   	function getQueryVariable(variable)

    {

        var query = window.location.search.substring(1);

        var vars = query.split("&");

        for (var i=0;i<vars.length;i++) {

            var pair = vars[i].split("=");

            if(pair[0] == variable){

               // return pair[1];

                //return decodeURIComponent(pair[1].replace(/\_/g, '%20'));
                return decodeURIComponent(pair[1].replace(/\_/g, '%20'));

                }

        }

        return(false);

    }    

    jQuery(document).ready(function() {

		  var dateObj = new Date();

		// test date is stored to dateObj

		// make month 2 digits (09 instead of 9) months are 0 based so note the +1

		var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);

		// make date 2 digits

		var date = ('0' + dateObj.getDate()).slice(-2);

		// get 4 digit year

		var year = dateObj.getFullYear();

		// concatenate into desired arrangement

		//var shortDate = 'Tháng ' + month + ' năm ' + year;
		var shortDate = 'Regular ' + year;

		

        jQuery('form').find('input.utm_source').each(function() {

            var a = getQueryVariable('utm_source');

            //var result1 = a.replace(/_/g, " ");

            var _weborganic = 'Organic'; // empty utm_source
            

            if(a){

                jQuery(this).val(a);

            }else if(a == 'sem'){
                
                jQuery('input[name=utm_source]').attr('value') = 'Organic';
            }
            else{

				jQuery(this).val(_weborganic);

            }

        });

        jQuery('form').find('input.utm_medium').each(function() {

            var a = getQueryVariable('utm_medium');

            var _bien = 'Website';

            if(a){

                jQuery(this).val(a);

            }else{

				jQuery(this).val(_bien);

            }

        });

        jQuery('form').find('input.utm_campaign').each(function() {

            var a = getQueryVariable('utm_campaign');

			var _webcampaign = 'Organic Website';

            if(a){

                jQuery(this).val(a);

            }else{

				jQuery(this).val(_webcampaign);

            }

        });

        jQuery('form').find('input.utm_term').each(function() {

            var a = getQueryVariable('utm_term');

            if(a){

                jQuery(this).val(a);

            }

        });

        jQuery('form').find('input.utm_content').each(function() {

            var a = getQueryVariable('utm_content');

            var _webchannel = shortDate; //emty

            if(a){

                jQuery(this).val(a);

            }else{

				jQuery(this).val(_webchannel);

            }

        });
        jQuery('form').find('input.lead_source').each(function() {

            var a = getQueryVariable('utm_source');

            var _webchannel = 'Digital'; //emty

            if(a == 'Direct Sale'){
                
                jQuery('input[name=lead_source]').attr('value') = 'Direct Sale';
                
            }
            else{

				jQuery(this).val(_webchannel);

            }

        });
    });



    function createCookie(name,value,days) {    

        var expires = "";

        if (days) {

            var date = new Date();

            date.setTime(date.getTime()+(days*24*60*60*1000));

            var expires = "; expires="+date.toGMTString();

        }

        document.cookie = name+"="+value+expires+"; path=/";

    }



    function readCookie(name) {

        var nameEQ = name + "=";

        var ca = document.cookie.split(';');

        for(var i=0;i < ca.length;i++) {

            var c = ca[i];

            while (c.charAt(0)==' ') c = c.substring(1,c.length);

            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);

        }

        return null;

    }

    function eraseCookie(name) {

        createCookie(name,"",-1);

    }

    var c_name = "_aaa_utmz";

    if(
        ("utm_source") != "") {

        createCookie("_aaa_utmz", getQueryVariable("utm_source") + "|" + getQueryVariable("utm_medium")+ "|" + getQueryVariable("utm_term")+ "|" + getQueryVariable("utm_campaign")+ "|" + getQueryVariable("utm_content")+ "|" + getQueryVariable("lead_source"), 60);

    }

    else if (readCookie(c_name)){

        c_start=readCookie(c_name);

        var _pipe = c_start.split("|");

        

       



  //       if (isset(_pipe[0])) {

		  

		// } else {

		//   jQuery("input[name=utm_source], .utm_source").val(_weborganic);

		// }

     

		jQuery("input[name=utm_source], .utm_source").val(_pipe[0]);

        jQuery("input[name=utm_medium], .utm_medium").val(_pipe[1]);

        jQuery("input[name=utm_term], .utm_term").val(_pipe[2]);

        jQuery("input[name=utm_campaign], .utm_campaign").val(_pipe[3]);

        jQuery("input[name=utm_content], .utm_content").val(_pipe[4]);
		// lead_source
		 jQuery("input[name=lead_source], .lead_source").val(_pipe[5]);
		

    }     

   

	

 })(jQuery);

