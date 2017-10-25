window.fbAsyncInit = function() {
            var appID =  1518529741559246;
            FB.init({
                appId      : appID,
                xfbml      : true,
                version    : 'v2.10',
                status     : true
            });
            FB.AppEvents.logPageView();
    /*FB.init({
        appId      : '404423476570910',
        xfbml      : true,
        version    : 'v2.8'
    });
    FB.AppEvents.logPageView();*/
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function fb_login() {
    // FB.getLoginStatus(function(response) {
    //     console.log(response);
    //     if (response.status === 'connected') {
    //         // the user is logged in and has authenticated your
    //         // app, and response.authResponse supplies
    //         // the user's ID, a valid access token, a signed
    //         // request, and the time the access token
    //         // and signed request each expire
    //         var uid = response.authResponse.userID;
    //         var accessToken = response.authResponse.accessToken;
    //     } else if (response.status === 'not_authorized') {
    //         // the user is logged in to Facebook,
    //         // but has not authenticated your app
    //     } else {
    //         // the user isn't logged in to Facebook.
    //     }
    // });
    // FB.getLoginStatus(function(response) {
    //     console.log(response);
    //     if (response.status === 'connected') {
    //         console.log('Logged in.');
    //         access_token = response.authResponse.accessToken; //get access token
    //         //userId = response.authResponse.userID; //get FB UID
    //         console.log(access_token);
    //         //console.log(userId);
    //         getEmail(response);
    //     }
    //     else {
    //         //call fb login
    //     }
    // });
    takePermissionAndLogin();
}

function takePermissionAndLogin() {
    FB.login(function (response) {
        console.log("response");
        console.log(response);
        if (response.authResponse) {
            access_token = response.authResponse.accessToken; //get access token
            //userId = response.authResponse.userID; //get FB UID
            console.log("Access Token");
            console.log(access_token);
            //console.log(userId);
            handleLoginSuccess(response);
        } else {
            console.log('Auth cancelled.')
        }
    }, {scope: 'public_profile, email, user_posts, user_about_me, user_birthday, user_education_history, user_events, user_likes, user_location, user_photos,' +
                'user_tagged_places, user_videos, user_website, user_work_history, publish_actions'});
}
function handleLoginSuccess() {
    $("#starter").css("display", "none");
    $("#puzzle-holder").css("display", "inherit");
    getEmail(response);
}
var fbUserId=0;
function getEmail() {
    FB.api('/me', { locale: 'en_US', fields: 'name, email, id, cover, first_name, last_name, age_range, link, gender, locale, picture, timezone' },
        function(response) {
            console.log("From FB.api");
            console.log(response);
            fbUserId = response.id;
            $.post('/save-basic-info', {info: response}).done(function (result) {
                console.log(result);
            });
            // FB.api(
            //     "/" + response.id + "/photos",
            //     function (response) {
            //         console.log(response);
            //         if (response && !response.error) {
            //             /* handle the result */
            //         }
            //     }
            // );
            // $.post("/addFacebookUser", {email: response.email, name : response.name, fb_userId : response.id}).done(function (data) {
            //     //$("#myModal").modal("hide");
            //     if(data.length !=0 && data["loggedIn"]!=null && data["loggedIn"] == true)
            //     {
            //         if(typeof curr_page === 'undefined' ||  curr_page == null || curr_page=="")
            //             window.location.reload();
            //         else if (curr_page == "checkout")
            //             window.location.href = '/checkout';
            //     }
            //     else
            //     {
            //         alert("Email already registered!");
            //         document.getElementById('fb_email_error').style.visibility = "visible";
            //         document.getElementById('fb_email_error').innerHTML = "Email already registered!";
            //     }
            //
            // });
        });
}
function showResultsWithFbId(score, winIndex) {
    window.location.href = "/results?score=" + score + "&fu=" + fbUserId + "&winInd=" + winIndex;
}
