<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<script src="https://apis.google.com/js/client:plusone.js?onload=loginFinishedCallback" type="text/javascript"></script>
<style type="text/css">
	html, body { margin: 0; padding: 0; }
	.hide { display: none;}
	.show { display: block;}
</style>
<script type="text/javascript">
  /**
   * Global variables to hold the profile and email data.
   */
   var profile, email;

  /*
   * Triggered when the user accepts the sign in, cancels, or closes the
   * authorization dialog.
   */
	
  function loginFinishedCallback(authResult) {
    //if (authResult) {
		/*if (authResult['status']['signed_in']) {
			document.getElementById('signin-button').setAttribute('style', 'display: none');
		} else {
			// Possible error values:
			//   "user_signed_out" - User is signed-out
			//   "access_denied" - User denied access to your app
			//   "immediate_failed" - Could not automatically log in the user
			console.log('Sign-in state: ' + authResult['error']);
		}*/
      if (authResult['status']['signed_in']){
        document.getElementById('signin-button').setAttribute('style', 'display: none');
        gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
      } else {
        console.log(authResult['error']);
      }
  }

  /**
   * Uses the JavaScript API to request the user's profile, which includes
   * their basic information. When the plus.profile.emails.read scope is
   * requested, the response will also include the user's primary email address
   * and any other email addresses that the user made public.
   */
  function loadProfile(){
    var request = gapi.client.plus.people.get( {'userId' : 'me'} );
    request.execute(loadProfileCallback);
  }

  /**
   * Callback for the asynchronous request to the people.get method. The profile
   * and email are set to global variables. Triggers the user's basic profile
   * to display when called.
   */
  function loadProfileCallback(obj) {
    profile = obj;

    // Filter the emails object to find the user's primary account, which might
    // not always be the first in the array. The filter() method supports IE9+.
    email = obj['emails'].filter(function(v) {
        return v.type === 'account'; // Filter out the primary email
    })[0].value; // get the email from the filtered results, should always be defined.
    displayProfile(profile);
  }

  /**
   * Display the user's basic profile information from the profile object.
   */
  function displayProfile(profile){
    document.getElementById('name').innerHTML = profile['displayName'];
    document.getElementById('pic').innerHTML = '<img src="' + profile['image']['url'] + '" />';
    document.getElementById('email').innerHTML = email;
    toggleElement('profile');
  }

  /**
   * Utility function to show or hide elements by their IDs.
   */
  function toggleElement(id) {
    var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
      el.setAttribute('class', 'show');
    } else {
      el.setAttribute('class', 'hide');
    }
  }
  </script>
  <div id="signin-button">
     <div class="g-signin"
      data-callback="loginFinishedCallback"
      data-approvalprompt="force"
      data-clientid="555613283129-6gnki4msiadk3ttrk68jdiqmsbqul16e.apps.googleusercontent.com"
      data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
      data-height="short"
      data-cookiepolicy="single_host_origin"
      >
    </div>
    <!-- In most cases, you don't want to use approvalprompt=force. Specified
    here to facilitate the demo.-->
  </div>

  <div id="profile" class="hide">
    <div>
      <span id="pic"></span>
      <span id="name"></span>
    </div>

    <div id="email"></div>
  </div>
<p>Wecome to the <b><?php echo Yii::app()->name; ?></b>.</p>
<!--<iframe width="640" height="390" src="//www.youtube.com/embed/utNNZOG8pUI" frameborder="0" allowfullscreen></iframe>-->
<?php //echo CHtml::encode(Yii::app()->basePath); ?>
<?php //$this->renderPartial('_form', array('userModel'=>$userModel, 'queryModel'=>$queryModel)) ?>
</br>
<p style="margin-top:15px">For more details on project, please email us at <a href="mailto:admin@uttarakhandsamaaj.com">admin@uttarakhandsamaaj.com</a>.
Feel free to post your comments on our <a href="https://www.facebook.com/uttarakhandrbl" target="_blank">facebook page</a>.</p>
