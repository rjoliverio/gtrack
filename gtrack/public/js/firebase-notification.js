// Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBgm4wnKRFsVZBNvj4kntTzNB-gBw4nnSc",
    authDomain: "mapsample-51a36.firebaseapp.com",
    databaseURL: "https://mapsample-51a36.firebaseio.com",
    projectId: "mapsample-51a36",
    storageBucket: "mapsample-51a36.appspot.com",
    messagingSenderId: "42946705440",
    appId: "1:42946705440:web:1b76b0abc758b9f2f9a445",
    measurementId: "G-YNRQ8ZCTXD"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
    var database = firebase.database();

    function seenClick(id)
    {
        database.ref('reports/'+id).set({
            data:"{}",
            seen:1
        });
        window.location.href = "/admin/reports/show/"+id;
    }
    database.ref('reports').on('value', function(snapshot){
        var count=0;
        var notif="";
        snapshot.forEach(function(idSnapshot){
            if(idSnapshot.val().seen==0){
                notif+="<a style='cursor:pointer;' class=\"dropdown-item d-flex align-items-center seen-notif "+idSnapshot.ref.key+" \" onClick='seenClick("+idSnapshot.ref.key+");' >"
                        +"<div class=\"mr-3\">"+
                        "<div class=\"icon-circle bg-danger\">"+
                            "<i class=\"fas fa-exclamation-triangle text-white\"></i>"+
                        "</div>"+
                        "</div>"+
                        "<div>"+
                        "<div class=\"small text-gray-500\">December 2, 2019</div>"+
                        "<span class='font-weight-bold'>Rj Oliverio</span>: Hello World | 10"+
                        "</div>"+
                    "</a>";
                    count++;
            }
        });
        if(count==0){
            $('.badge-notif-count').text("");
        }else{
            $('.badge-notif-count').text(count);
        }
        $('.notif-item').html(notif);
    });
    
    // $('a .seen-notif').on('click',function(e){
    //     var lastClass = this.attr('class').split(' ').pop();
    //     database.ref('reports/'+lastClass).set({
    //         data:"{}",
    //         seen:1
    //     });
    //     window.location.href = "/admin/reports";
    // });

    function seenMsgClick(id)
    {
        var email=$('.email'+id).text();
        var created_at=$('.created_at'+id).text();
        var subject=$('.subject'+id).text();
        database.ref('messages/'+id).set({
            created_at:created_at,
            email:email,
            seen:1,
            subject:subject
        });
        window.open("https://mail.google.com", "_blank");
    }
    database.ref('messages').on('value', function(snapshot){
        var count=0;
        var msg="";
        snapshot.forEach(function(idSnapshot){
            if(idSnapshot.val().seen==0){
                msg+="<a style='cursor:pointer;' class=\"dropdown-item d-flex align-items-center \" onClick='seenMsgClick(\""+idSnapshot.ref.key+"\");'>"+
                    "<div class=\"font-weight-bold\">"+
                    "<div class=\"text-truncate subject"+idSnapshot.ref.key+"\">GTrack Gmail: "+idSnapshot.val().subject+"</div>"+
                    "<div class=\"small text-gray-500\"><span class='email"+idSnapshot.ref.key+" small'>"+idSnapshot.val().email+"</span> · <span class='created_at"+idSnapshot.ref.key+" small'>"+idSnapshot.val().created_at+"</span></div>"+
                    "</div>"+
                    "</a>";
                count++;
            }
        });
        if(count==0){
            $('.badge-notif-messages').text("");
        }else{
            $('.badge-notif-messages').text(count);
        }
        $('.notif-messages').html(msg);
    });
    function seenAllMsgClick()
    {
        database.ref('messages').on('value', function(snapshot){
            snapshot.forEach(function(idSnapshot){
                database.ref('messages/'+idSnapshot.ref.key).set({
                    created_at:idSnapshot.val().created_at,
                    email:idSnapshot.val().email,
                    seen:1,
                    subject:idSnapshot.val().subject
                });
            });
        });
        window.open("https://mail.google.com", "_blank");
    }