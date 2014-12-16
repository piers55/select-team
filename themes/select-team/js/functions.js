(function( $ ) {
  "use strict";
  $(function(){

    /*
    ** Para el video cuando se cierra el modal
    */
    $('.modal').each(function(){
      var src = $(this).find('iframe').attr('src');
      $(this).on('click', function(){
        $(this).find('iframe').attr('src', '');
        $(this).find('iframe').attr('src', src);
      });
    });
  });


}(jQuery));

//PANTALLA INICIAL

setTimeout(function(){
  $('.start-screen').fadeOut(800);},
  5000);

//ISOTOPE
var $=jQuery.noConflict();
function correIsotope(contenedor, item, layoutMode){
  var $container = $('.sportContainer');
  $container.imagesLoaded(function(){
    $container.isotope({
      itemSelector: item,
      layoutMode: layoutMode
    });
  });
}

function filtrarIsotopeDefault(contenedor, filterDefault){
  var $container = $(contenedor);
  $container.isotope({ filter: filterDefault });
}

function filtrarIsotope(este, contenedor, elemento){
  var filterValue = este.data('filter');
  var $container = $(contenedor);
  $container.isotope({ filter: filterValue });
  $(elemento).removeClass('active');
  este.addClass('active');
}

function reorder(este, contenedor){
  var sport = $('#sportAll').attr('data-active');
  var gender = $('#genderAll').attr('data-active');
  if (typeof sport === 'undefined') {
      sport = "";
  }
  if (typeof gender === 'undefined') {
      gender = "";
  }
  var filterString = sport+gender;
  if(filterString=="**"){
      filterString = "*";
  }
  este.parents('.button-group').find('.active').removeClass('active');
  este.addClass('active');
  var $container = $(contenedor);
  $container.isotope({
      filter: filterString,
      animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false,
      }
  });
}

function setAlturaWindowMenosHeader(element){
  var alturaHeader = $('header').outerHeight();
  var alturaWindow = $(window).outerHeight();
  var alturaTotal = alturaWindow - alturaHeader;
  $(element).height(alturaTotal);
}

function setAlturaWindow(element){
  var alturaWindow = $(window).height();
  $(element).height(alturaWindow);
}

function filterQuestions(){
  $('#theForm #q5').on('change', function() {
    var sport = $(this).val();
    $('#theForm .js-sport:not(".js-'+sport+'")').remove();
  });
  $('#theForm2 #q3').on('change', function(event) {
    var sport = $(this).val();
    $('#theForm2 .js-sport:not(".js-'+sport+'")').remove();
  });
}

function toggleClassCards(ancho){
  if( ancho > 767 ){
    $('.cards').removeClass('cards-xs');
  } else {
    $('.cards').addClass('cards-xs');
  }
}

function abrirCards(element){
  var cards = element.data('cards');
  if ( cards == 'prospect' ){
      $('.grid').css({
        'left':'50%',
        'right':'auto'
      });
  }
  if ( cards == 'coach' ){
      $('.grid').css({
        'right':'50%',
        'left':'auto'
      });
  }

  $('.cards').removeClass('is-opened').addClass('is-closed');
  $('.cards.cards-'+cards).removeClass('is-closed').addClass('is-opened');
}

function cerrarCards(element){
  var papa = element.parent('.cards');
  if ( papa.hasClass('cards-prospect') ){
    $('.cards-prospect').removeClass('is-opened').addClass('is-closed');
    $('.grid').css({
      'left':'0',
      'right':'auto'
    });
  }
  if ( papa.hasClass('cards-coach') ){
    $('.cards-coach').removeClass('is-opened').addClass('is-closed');
    $('.grid').css({
      'right':'0',
      'left':'auto'
    });
  }
}

function siguienteCardProspect(element){
  var card = element.data('card');
  $('.cards-prospect .card').removeClass('is-opened').addClass('is-closed');
  $('.cards-prospect .'+card).removeClass('is-closed').addClass('is-opened');
}

function siguienteCardCoach(element){
  var card = element.data('card');
  $('.cards-coach .card').removeClass('is-opened').addClass('is-closed');
  $('.cards-coach .'+card).removeClass('is-closed').addClass('is-opened');
}

function urlAbre(){
  var url = location.pathname;
  if (window.location.href.indexOf("prosprectOpen") > -1)  {
    console.log('url');
    $('.grid').css({
      'left':'50%',
      'right':'auto'
    });
    $('.cards').removeClass('is-opened').addClass('is-closed');
    $('.cards.cards-prospect').removeClass('is-closed').addClass('is-opened');
  }
}

/* DASHBOARD */
$("#dashboard .sidebar-nav li").click(function(e) {
    if ( $(this).hasClass('sidebar-brand') || $(this).hasClass('j-download') ){
        $('#dashboard .sidebar-nav li').removeClass('active');
    } else {
        $('#dashboard .sidebar-nav li').removeClass('active');
        $(this).addClass('active');
    }
});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#dashboard, #sidebar-wrapper").toggleClass("toggled");
});

$('#page-content-wrapper .js-prospects , #page-content-wrapper .js-advisors, #page-content-wrapper .js-curriculum, #page-content-wrapper .js-messages').css('display','none');

$('.dashboard-menu').click(function() {
            if ($(this).hasClass('js-profile-admin')) {
                $(".js-basic-profile").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-prospects , #page-content-wrapper .js-advisors").hide('fast', function(){
                    $(".js-basic-profile").show();
                });
            }

            else if ($(this).hasClass('js-prospects')){
                $(".js-prospects").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-basic-profile , #page-content-wrapper .js-advisors").hide('fast', function(){
                    $(".js-prospects").show();
                });
                correIsotope('.isotope-container-sports', '.player', 'masonry');
            }
            else if ($(this).hasClass('js-advisors')){
                $(".js-advisors").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-basic-profile , #page-content-wrapper .js-prospects").hide('fast', function(){
                    $(".js-advisors").show();  
                });
            }
            else if ($(this).hasClass('js-profile')){
                $(".js-profile").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-curriculum , #page-content-wrapper .js-messages").hide('fast', function(){
                    $(".js-profile").show();  
                });
            }
            else if ($(this).hasClass('js-curriculum')){
                $(".js-curriculum").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-profile , #page-content-wrapper .js-messages").hide('fast', function(){
                    $(".js-curriculum").show();  
                });
            }
            else if ($(this).hasClass('js-messages')){
                $(".js-messages").addClass('dashboard-active').siblings().removeClass('dashboard-active');
                $("#page-content-wrapper .js-curriculum , #page-content-wrapper .js-profile").hide('fast', function(){
                    $(".js-messages").show();  
                });
            }
            else {
                console.log('mal');
            }
        });

// FOOTER
function footerBottom(){
    var alturaFooter = $('footer').outerHeight();
    $('.container-fluid').css('padding-bottom', alturaFooter );
}



function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}

function elegirDeporte(deporte){

  $('.j-register-user select[name="tennis_hand"]').parent().hide();
  $('.j-register-user input[name="fmt_ranking"]').parent().hide();
  $('.j-register-user select[name="atp_tournament"]').parent().hide();
  $('.j-register-user select[name="average_score"]').parent().hide();
  $('.j-register-user select[name="soccer_position"]').parent().hide();
  $('.j-register-user input[name="soccer_height"]').parent().hide();
  $('.j-register-user select[name="volley_position"]').parent().hide();
  $('.j-register-user input[name="volley_height"]').parent().hide();
  
  switch(deporte){
    case 'tennis':
      $('.j-register-user select[name="tennis_hand"]').parent().show();
      $('.j-register-user input[name="fmt_ranking"]').parent().show();
      $('.j-register-user select[name="atp_tournament"]').parent().show();

      break;

    case 'golf':
      $('.j-register-user select[name="average_score"]').parent().show();      
      break;
  
    case 'soccer':
      $('.j-register-user select[name="soccer_position"]').parent().show();
      $('.j-register-user input[name="soccer_height"]').parent().show();
      break;

    case 'volleyball':
      $('.j-register-user select[name="volley_position"]').parent().show();
      $('.j-register-user input[name="volley_height"]').parent().show();
      break;
  }
}



function addTournament(){
  if ($('.j-user_curriculum input[name="tournament"]').val()!='' && $('.j-user_curriculum input[name="tournament_date"]').val()){
    $tournament_name= $('.j-user_curriculum input[name="tournament"]').val();
    $tournament_date= $('.j-user_curriculum input[name="tournament_date"]').val();
    $tournament_rank= $('.j-user_curriculum input[name="tournament_rank"]').val();
  
    $('.j-tournaments').append('<input type="hidden" name="torneo" value="'+$tournament_name+'"/> ');
    $('.j-tournaments').append('<input type="hidden" name="torneo-rank" value="'+$tournament_date+'"/> ');
    $('.j-tournaments').append('<input type="hidden" name="torneo-fecha" value="'+$tournament_rank+'"/> ');
    

    $('.j-user_curriculum input[name="tournament_data[]"]').val($tournament_name);
    $('.j-user_curriculum input[name="tournament_date_data[]"]').val($tournament_date);
    $('.j-user_curriculum input[name="tournament_rank_data[]"]').val($tournament_rank);
    
    $('.j-tournaments').append( '<div class="[ form-group ] [ row ] [ j-del-tournament ] [ border-bottom margin-bottom ] "><p id="nameTournament" class="[ col-xs-12 ]"><b>'+$tournament_name+'</b></p>'  + '<p id="Fecha" class="[ col-xs-6 ]"><b>Date:<br/></b> '+$tournament_date+'</p>' + '<p id="tournamentRank" class="[ col-xs-4 ]"><b>Ranked:<br/></b> '+$tournament_rank+'</p>' + '<a onclick="delete_dinamic_tournament(this)" class="[ col-xs-2 ] [ color-success ] [ j-delete-tournament ] [ text-right ]"> <i class="fa fa-times-circle fa-2x"></i></a></div>' );

    $('.j-user_curriculum input[name="tournament"]').val("");
    $('.j-user_curriculum input[name="tournament_date"]').val("");
    $('.j-user_curriculum input[name="tournament_rank"]').val("");
    updateCurriculum();
  }
}

function deleteAcademic(e){
  $parent = e;
  $parent.hide('slow');
  var childs = e['0'].childNodes;    
  console.log(childs);
  var date_split    = childs[1].innerText.split(':');
  var name_split    = childs[3].innerText.split(':');
  var country_split = childs[5].innerText.split(':');
  var city_split    = childs[7].innerText.split(':');
  var id    = childs[9].value;

  var date  = date_split[1].substring(1);
  var name = name_split[1].substring(1);
  var country = country_split[1].substring(1);
  var city   = city_split[1].substring(1);

  console.log(date, name, country, city, id);

  $.get(
    site_url+'/dashboard/'+'?date='+date+'&nom='+name+'&country='+country+'&city='+city+'&del='+id,
    function(response){

    } //response
  );
}

function delete_dinamic_tournament(e){
  var childs = e.parentNode.childNodes;  
  var nombre = childs[0].innerText;
  var dateSplit = childs[1].innerText.split(':');
  
  var date = dateSplit[1];
  var rankSplit = childs[2].innerText.split(':');
  var rank = rankSplit[1];

  var tournament_data={};
  tournament_data['action'] = 'delete_tournament';
  tournament_data['tournament_name'] = nombre;
  tournament_data['tournament_date'] = date.substring(1);
  tournament_data['tournament_rank'] = rank.substring(1);

  console.log(tournament_data);
  e.parentNode.style.display='none';
  
  $.post(
        ajax_url,
        tournament_data,
        function(response){
            console.log(response);
            //window.location = site_url + '/dashboard';
        }// response
    );   
}

function deleteTournament(e){
  var x= e.target.parentNode.id;
  if(x==''){ x= e.target.parentNode.parentNode.id;}
  console.log(x);
  var tournament_data={};
  tournament_data['action'] = 'delete_tournament';
  tournament_data['tournament_name']  = $('.j-'+x+' input[name="torneo"]').val();
  tournament_data['tournament_date']  = $('.j-'+x+' input[name="torneo-fecha"]').val();
  tournament_data['tournament_rank']  = $('.j-'+x+' input[name="torneo-rank"]').val();
  $('.j-'+x ).hide();

  $.post(
        ajax_url,
        tournament_data,
        function(response){
            //console.log(response);
            //window.location = site_url + '/dashboard';
        }// response
    ); 
}

function registerTournament(){
  console.log("registerTournament");
  var new_tournament_data = {};

  new_tournament_data['action']='register_tournament';
  var tournament_data = new Array();
  var values = $("input[name='tournament_data\[\]']").each(function() {
    tournament_data.push($(this).val());
  });
  new_tournament_data['tournament']= tournament_data;
  
  var tournament_date_data = new Array();
  var values = $("input[name='tournament_date_data\[\]']").each(function() {
    tournament_date_data.push($(this).val());
  });
  new_tournament_data['tournament_date']= tournament_date_data;

  var tournament_rank_data = new Array();
  var values = $("input[name='tournament_rank_data\[\]']").each(function() {
    tournament_rank_data.push($(this).val());
  });
  new_tournament_data['tournament_rank']= tournament_rank_data;

  if(tournament_rank_data.length>0)
    $.post(
          ajax_url,
          new_tournament_data,
          function(response){
              
              //window.location = site_url + '/dashboard';
          }// response
      );
}

function registerUser() {
    var user_data = {};

    user_data['action'] = 'register_user';
    user_data['username'] = $('.j-register-user input[name="username"]').val();
    user_data['password'] = $('.j-register-user input[name="password"]').val();
    user_data['password_confirmation'] = $('.j-register-user input[name="password_confirmation"]').val();
    user_data['email'] = $('.j-register-user input[name="email"]').val();
    user_data['gender'] = $('.j-register-user select[name="gender"]').val();
    user_data['full_name'] = $('.j-register-user input[name="full_name"]').val();
    user_data['date_of_birth'] = $('.j-register-user input[name="date_of_birth"]').val();
    user_data['sport'] = $('.j-register-user select[name="sport"]').val();

    switch(user_data['sport']){
        case 'tennis': 
            user_data['tennis_hand'] = $('.j-register-user select[name="tennis_hand"]').val();
            user_data['fmt_ranking'] = $('.j-register-user input[name="fmt_ranking"]').val();
            user_data['atp_tournament'] = $('.j-register-user select[name="atp_tournament"]').val();
            break;
        case 'golf':
            user_data['average_score'] = $('.j-register-user select[name="average_score"]').val();
            break;
        case 'soccer':
            user_data['soccer_position'] = $('.j-register-user select[name="soccer_position"]').val();
            user_data['soccer_height'] = $('.j-register-user input[name="soccer_height"]').val();
            break;
        case 'volleyball':
            user_data['volley_position'] = $('.j-register-user select[name="volley_position"]').val();
            user_data['volley_height'] = $('.j-register-user input[name="volley_height"]').val();
    }
    console.log(user_data);
    $.post(
        ajax_url,
        user_data,
        function(response){
            window.location = site_url + '/?reg=1';
            // console.log(response);
            // var msg = $.parseJSON(response);
            // if(msg.error == 0)
                //loginUser(user_data['username'], user_data['password']);
                
                //

        }// response
    ); 
}// registerUser

function addAcademic(){
  //if ($('.j-academic input[name="high_school"]').val()!='' && $('.j-academic input[name="high_grad"]').val()){
    $academic_name= $('.j-user_curriculum input[name="high_school"]').val();
    $academic_date= $('.j-user_curriculum input[name="high_grad"]').val();
    $academic_country= $('.j-user_curriculum input[name="country"]').val();
    $academic_city= $('.j-user_curriculum input[name="city"]').val();
    
    var academic_data = {};
    academic_data['action']='academic_data';
    academic_data['name']=$academic_name;
    academic_data['date']=$academic_date;
    academic_data['country']=$academic_country;
    academic_data['city']=$academic_city;

    //$('.j-user_curriculum input[name="tournament_data[]"]').val($academic_name);
    //$('.j-user_curriculum input[name="tournament_date_data[]"]').val($academic_date);
    //$('.j-user_curriculum input[name="tournament_rank_data[]"]').val($academic_country);
    //$('.j-user_curriculum input[name="tournament_rank_data[]"]').val($academic_city);
    
    //$('.j-user_curriculum').append( '<div class="[ form-group ] [ row ] [ j-del-tournament ] [ border-bottom margin-bottom ] "><p id="nameTournament" class="[ col-xs-12 ]"><b>'+$academic_name+'</b></p>'  + '<p id="Fecha" class="[ col-xs-6 ]"><b>Date:<br/></b> '+$tournament_date+'</p>' + '<p id="tournamentRank" class="[ col-xs-4 ]"><b>Ranked:<br/></b> '+$tournament_rank+'</p>' + '<a onclick="delete_dinamic_tournament(this)" class="[ col-xs-2 ] [ color-success ] [ j-delete-tournament ] [ text-right ]"> <i class="fa fa-times-circle fa-2x"></i></a></div>' );

    $append='<div class="[ form-group ] [ row ] [ border-bottom ]"> <p class="[ col-xs-6 ]"> Year: <br><b>'+$academic_date+
    '</b></p><p class="[ col-xs-4 ]"> School: <br><b>'+$academic_name+
    '</b></p><p class="[ col-xs-6 ]">Country: <br><b>'+$academic_country+
    '</b></p> <p class="[ col-xs-4 ]">City: <br><b>'+$academic_city+
    '</b></p><a class="[ col-xs-2 ] [ color-success ] [ j-delete-academic ] [ text-right ]"> <i class="fa fa-times-circle fa-2x"></i></a></div>'
    $('.j-academic').append($append); 

      //$('.j-user_curriculum input[name="tournament_rank_data[]"]').val($academic_city);

    $('.j-user_curriculum input[name="high_school"]').val("");
    $('.j-user_curriculum input[name="high_grad"]').val("");
    $('.j-user_curriculum input[name="country"]').val("");
    $('.j-user_curriculum input[name="city"]').val("");
    //updateCurriculum();
    console.log(academic_data);
    var data = $('.j-user_curriculum').serialize();
    //console.log(academic_data.serialize());

      $.get(
        site_url+'/dashboard/'+'?high_school='+$academic_name+'&high_grad='+$academic_date+'&country='+$academic_country+'&city='+$academic_city+'',
        function(response){
          console.log(response);
        } //response
      ); 
  //}
}


function getAdvisorBasicInfo(id){
	var user_data = {};
	user_data['action'] = 'get_info_advisor';
    user_data['id'] = id;


	$.post(
        ajax_url,
        user_data,
        function(response){
          console.log(1);
    			console.log(response);
    			var msg = $.parseJSON(response.slice(0,-1));
    			console.log(msg);
    			$('.j-register-advisor input[name="full_name"]').val(msg.full_name);
    			$('.j-register-advisor input[name="id"]').val(msg.ID);
    			$('.j-register-advisor input[name="username"]').val(msg.user_login);
    			$('.j-register-advisor input[name="email"]').val(msg.user_email);
    			
    			$('.hide-form-advisor').show('slow');
    			$('.btn-agregar').hide();
          $('.btn-editar').show();
        }// response
    ); 
}

function deleteAdvisor(id){
  var advisor_data = {};
  advisor_data['action']= 'delete_advisor';
  advisor_data['id']= id;
    $.post(
        ajax_url,
        advisor_data,
        function(response){
          console.log(response);
          var html_feedback = '<div class="[ alert alert-success ] [ col-xs-12 ]" role="alert">Se ha eliminado el advisor.</div>';
            $(html_feedback).appendTo('.j-confirm');
          //var msg = $.parseJSON(response);
        }// response
    ); 
}

function deleteProspect(id){
  var advisor_data = {};

  advisor_data['action']= 'delete_prospect';
  advisor_data['id']= id;

  $.post(
      ajax_url,
      advisor_data,
      function(response){
        window.location = site_url + '/dashboard-admin/';
      }// response
  );
}



function updateAdvisor() {
    var user_data = {};

    user_data['action'] = 'update_advisor';
  	user_data['id'] = $('.j-register-advisor input[name="id"]').val();
    user_data['password'] = $('.j-register-advisor input[name="password"]').val();
    user_data['full_name'] = $('.j-register-advisor input[name="full_name"]').val();
   
    console.log(user_data);
    $.post(
        ajax_url,
        user_data,
        function(response){
          console.log(response);
          var msg = $.parseJSON(response);

          if(msg.error == 0){
            alert('Advisor guardado con exito');
			location.reload();
		  }
          else if (msg.error == 1) {
			alert('El usuario ya existe');
		  } else {
			alert('Error, porfavor revisa los datos');
		  }
        }// response
    );
}// updateAdvisor

function updateBasicProfile() {
    var user_data = {};

    user_data['action'] = 'update_advisor';
    user_data['full_name'] = $('input[name="full_name_perfil"]').val();
   
    console.log(user_data);
    $.post(
        ajax_url,
        user_data,
        function(response){
			
        console.log(response);
        var msg = $.parseJSON(response);

        if(msg.error == 0)
          alert('Advisor guardado con exito*');
        else if(msg.error == 1)
				  alert('El usuario ya existe');
        else
				  alert('Error, porfavor revisa los datos');

        }// response
    ); 
}// updateBasicProfile

function registerAdvisor() {
    var user_data = {};

    user_data['action'] = 'register_advisor';
    user_data['username'] = $('.j-register-advisor input[name="username"]').val();
    user_data['password'] = $('.j-register-advisor input[name="password"]').val();
    user_data['password_confirmation'] = $('.j-register-advisor input[name="password_confirmation"]').val();
    user_data['email'] = $('.j-register-advisor input[name="email"]').val();
    user_data['full_name'] = $('.j-register-advisor input[name="full_name"]').val();
    console.log(user_data);
    $.post(
        ajax_url,
        user_data,
        function(response){
			
			console.log(response);
            var msg = $.parseJSON(response);
            console.log(msg.id, user_data['action']);
            if(msg.error == 0){
              var html_feedback = '<div class="[ alert alert-success ] [ col-xs-12 ]" role="alert">Se han registrados los datos del advisor.</div>';
              $(html_feedback).appendTo('.j-form-confirm');
              $('.hide-form-advisor').hide();
              //window.location = site_url + '/dashboard-admin';

              var createdAdvisor = '<p class="[ col-xs-12 col-sm-6 ]"> <i class="fa fa-briefcase"></i> <b>'+user_data['full_name']+'</b> - <a href="mailto:'+user_data['email']+'">'+user_data['email']+'</a><a href="#" data-id="'+msg.id+'" class="[ edit-advisor ]"> Edit </a> / <a href="#" data-id="'+msg.id+'" class="[ delete-advisor ]"> Delete </a> </p>';
              $(createdAdvisor).appendTo('.j-advisors-db');
            }
      			else if(msg.error == 1)
      				alert('El usuario ya existe');
      			else
      				alert('Error, porfavor revisa los datos');
        }// response
    ); 
}// registerAdvisor




function createCurriculum() {
  var user_curriculum_data = {};

  user_curriculum_data['action'] = 'create_curriculum';
  user_curriculum_data['address'] = $('.j-user_curriculum input[name="curriculum_address"]').val();
  user_curriculum_data['phone'] = $('.j-user_curriculum input[name="curriculum_phone"]').val();
  user_curriculum_data['mobile_phone'] = $('.j-user_curriculum input[name="curriculum_mobile_phone"]').val();
  user_curriculum_data['high_school'] = $('.j-user_curriculum input[name="high_school"]').val();
  user_curriculum_data['grade'] = $('.j-user_curriculum select[name="grade"]').val();
  user_curriculum_data['high_grad'] = $('.j-user_curriculum input[name="high_grad"]').val();
  
  //Sports Development
  if($('.j-user_curriculum input[name="tournament"]').val()!='' && $('.j-user_curriculum select[name="tournament_rank"]').val()!='')
      addTournament();
  
  registerTournament();

  console.log(user_curriculum_data);
  $.post(
      ajax_url,
      user_curriculum_data,
      function(response){
          console.log(response);
          //window.location = site_url + '/dashboard';
      } //response
  ); 
}// createCurriculum


function updateCurriculum() {
    var user_curriculum_data = {};

    user_curriculum_data['action'] = 'update_curriculum';
    user_curriculum_data['address'] = $('.j-user_curriculum input[name="curriculum_address"]').val();
    user_curriculum_data['phone'] = $('.j-user_curriculum input[name="curriculum_phone"]').val();
    user_curriculum_data['mobile_phone'] = $('.j-user_curriculum input[name="curriculum_mobile_phone"]').val();
    user_curriculum_data['high_school'] = $('.j-user_curriculum input[name="high_school"]').val();
    user_curriculum_data['grade'] = $('.j-user_curriculum select[name="grade"]').val();
    user_curriculum_data['high_grad'] = $('.j-user_curriculum input[name="high_grad"]').val();
    user_curriculum_data['video_host'] = $('.j-user_curriculum input:selected').val();
  
    //Sports Development
    if($('.j-user_curriculum input[name="tournament"]').val()!='' && $('.j-user_curriculum select[name="tournament_rank"]').val()!='')
        addTournament();

    registerTournament();

    $.post(
        ajax_url,
        user_curriculum_data,
        function(response){
            var html_feedback = '<div class="[ alert alert-success ] [ col-xs-12 ]" role="alert">Se han actualizado los datos del torneo.</div>';
            $(html_feedback).appendTo('.j-user_curriculum');
          
      } //response
  ); 
}// updateCurriculum

function updateAllCurriculum() {
    var user_curriculum_data = {};

    user_curriculum_data['action'] = 'update_curriculum';
    user_curriculum_data['address'] = $('.j-user_curriculum input[name="curriculum_address"]').val();
    user_curriculum_data['phone'] = $('.j-user_curriculum input[name="curriculum_phone"]').val();
    user_curriculum_data['mobile_phone'] = $('.j-user_curriculum input[name="curriculum_mobile_phone"]').val();
    user_curriculum_data['high_school'] = $('.j-user_curriculum input[name="high_school"]').val();
    user_curriculum_data['grade'] = $('.j-user_curriculum select[name="grade"]').val();
    user_curriculum_data['high_grad'] = $('.j-user_curriculum input[name="high_grad"]').val();
    user_curriculum_data['video_host'] = $('.j-user_curriculum input:selected').val();
  
    //Sports Development
    if($('.j-user_curriculum input[name="tournament"]').val()!='' && $('.j-user_curriculum select[name="tournament_rank"]').val()!='')
        addTournament();

    $.post(
        ajax_url,
        user_curriculum_data,
        function(response){
            var html_feedback = '<div class="[ alert alert-success ] [ col-xs-12 ]" role="alert">Se han actualizado los datos de tu curriculum.</div>';
            $(html_feedback).appendTo('.j-user_curriculum');
          
      } //response
  ); 
}// updateCurriculum


function updateUserInfo() {
    var user_data = {};
    user_data['action'] = 'update_user';
    user_data['full_name'] = $('.j-update-basic-profile input[name="full_name"]').val();
    user_data['video_host'] = $('.j-update-basic-profile input[name="video_host"]:checked').val();
    user_data['video_url'] = $('.j-update-basic-profile input[name="video_url"]').val();
    user_data['sport'] = $('.j-update-basic-profile input[name="sport"]').val();

    console.log(user_data);
    switch(user_data['sport']){
        case 'tennis': 
            //user_data['tennis_hand'] = $('.j-update-basic-profile select[name="tennis_hand"]').val();
            user_data['fmt_ranking'] = $('.j-update-basic-profile input[name="fmt_ranking"]').val();
            user_data['atp_tournament'] = $('.j-update-basic-profile select[name="atp_tournament"]').val();
            break;
        case 'golf':
            user_data['average_score'] = $('.j-update-basic-profile select[name="average_score"]').val();
            break;
        case 'soccer':
            user_data['soccer_position'] = $('.j-update-basic-profile select[name="soccer_position"]').val();
            //user_data['soccer_height'] = $('.j-update-basic-profile input[name="soccer_height"]').val();
            break;
        case 'volleyball':
            user_data['volley_position'] = $('.j-update-basic-profile select[name="volley_position"]').val();
            //user_data['volley_height'] = $('.j-update-basic-profile input[name="volley_height"]').val();
    }// switch
    $('.j-update-basic-profile .alert-success').remove();
     $.post(
         ajax_url,
         user_data,
         function(response){
             var html_feedback = '<div class="[ alert alert-success ] [ col-xs-12 ]" role="alert">Se han actualizado los datos de tu perfil.</div>';
             $(html_feedback).appendTo('.j-update-basic-profile');
         } //response
     ); 
}// updateUser


function login(){
    var user_data = {};
    user_data['action'] = 'site_login';
    user_data['username'] = $('.j-login input[name="j-email"]').val();
    user_data['password'] = $('.j-login input[name="j-password"]').val();
  
    $('.j-login .alert').remove();
    $.post(
        ajax_url,
        user_data,
        function(response){   
            console.log(response);
            if(response == 1){
                redirectUserDashoard();
            }
            else{
                var html_error = '<div class="text-center alert" role="alert"><p>Nombre de usuario o contraseña inválidos.</p></div>';
                $(html_error).prependTo('.modal-footer');
            }
        } //response
    ); 
}

function loginUser(user, password){
    var user_data = {};
    user_data['action'] = 'site_login';
    user_data['username'] = user;
    user_data['password'] = password;

    console.log(user_data);
  
    $.post(
        ajax_url,
        user_data,
        function(response){
            console.log(response);
            if(response == 1){
                redirectUserDashoard();
            }
        } //response
    ); 
}

/**
* Form Validation
* @return void
**/
function formValidation(forma){
    $(forma).validate({
        rules: {
          password_confirmation:{
            equalTo: "#password"
          }
        },
        submitHandler:function(){
            switch(forma){
                case '.j-register-user':
                    registerUser();
                    break;
                case '.j-register-advisor':
                    registerAdvisor();
                    break;
                case '.j-update-advisor':
                    updateAdvisor();
                    break;
                case '.j-form-message-advisor':
                    sendMessage();
                    break;
                case '.j-contact-message':
                    sendContactMessage();
                    break;
                default:
                    console.log('default');
                    break;
            }
        }
    });
}

function sendContactMessage(){
  var contact_data= {};

  contact_data['action']  = 'contact_message';
  contact_data['name']    = $('.j-contact-message input[name="name"]').val();
  contact_data['email']   = $('.j-contact-message input[name="email"]').val();
  contact_data['message'] = $('.j-contact-message textarea[name="message"]').val();

  console.log(contact_data);

  $.post(
        ajax_url,
        contact_data,
        function(response){
          console.log(response);
        } //response
    );
}

function redirectUserDashoard(){
    var user_data = {};
    user_data['action'] = 'get_user_role';
  
    $.post(
        ajax_url,
        user_data,
        function(response){   
            if(response == 'subscriber')
                window.location = site_url + '/dashboard';
            else
                window.location = site_url + '/dashboard-admin';
        } //response
    ); 
}// redirectUserDashoard

function sendMail(){
  console.log("mail");
  var coach_data = {};
  coach_data['action'] = 'send_coach_email';
  coach_data['name'] = $('#theForm2 input[name="q1"]').val();
  coach_data['email'] = $('#theForm2 input[name="q2"]').val();
  coach_data['sport'] = $('#theForm2 select[name="q3"]').val();
  
  switch(coach_data['sport']){
        case 'tennis': 
            coach_data['tennis_hand'] = $('#theForm2 select[name="q6"]').val();
            coach_data['fmt_ranking'] = $('#theForm2 input[name="q7"]').val();
            break;
        case 'golf':
            coach_data['average_score'] = $('#theForm2 select[name="q4"]').val();
            break;
        case 'soccer':
            coach_data['soccer_position'] = $('#theForm2 select[name="q8"]').val();
            break;
        case 'volleyball':
            coach_data['volley_position'] = $('#theForm2 select[name="q5"]').val();
    }// switch

     $.post(
         ajax_url,
         coach_data,
         function(response){
             console.log(response);
             //window.location = site_url + '/dashboard';
         } //response
     );
}

function sendMessage(){
  var message_data = {};
  message_data['action'] = 'send_message';
  message_data['email'] = $('.j-form-message-advisor select[name="selectMensajeAdvisor"]').val();
  message_data['message'] = $('.j-form-message-advisor textarea[name="txtareaMensajeAdvisor"]').val();
  console.log(message_data);
     $.post(
         ajax_url,
         message_data,
         function(response){
             //window.location = site_url + '/dashboard';
         } //response
     );
}


