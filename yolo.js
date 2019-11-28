window.addEventListener("load", function() {
    var streaming = false,
        video = document.querySelector('#video'),
        canvas = document.querySelector('#canvas'),
        photo = document.querySelector('#photo'),
        list_live = document.querySelector('#list_live'),
        startbutton = document.querySelector('#startbutton'),
        inputimg = document.querySelector('#img_web'),
        width = 550,
        height = 0,
        input_img = document.querySelector("#manual_img"),
        web_picture = document.querySelector(".take_picture"),
        i = 0,
        form_radio = document.form_picture.montage_select,
        checked = false;

    if (checked === false) {
        for (var i = 0; i < form_radio.length; i++) {
            form_radio[i].onclick = function(e) {
                if (e.target.checked === true) {
                    checked = true;
                    startbutton.disabled = false;
                }
            }
        }
    }
    navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function(stream) {
            video.srcObject = stream;
            inputimg.setAttribute("name", "image_cam");
            web_picture.style.display = "block";
            video.play();
        })
        .catch(function(err) {
            console.log("An error occurred: " + err);
            console.log(err);
            input_img.setAttribute("name", "image_article");
            input_img.required = true;
            input_img.hidden = false;
        });


    video.addEventListener('canplay', function(ev) {
        if (!streaming) {
            height = video.videoHeight / (video.videoWidth / width);

            video.setAttribute('width', width);
            video.setAttribute('height', height);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
        }
    }, false);

    startbutton.addEventListener('click', function(ev) {
        takepicture();
        ev.preventDefault();
    }, false);

    clearphoto();

    function clearphoto() {
        var context = canvas.getContext('2d');
        context.fillStyle = "#AAA";
        context.fillRect(0, 0, canvas.width, canvas.height);

        var data = canvas.toDataURL('image/png;base64');
        photo.setAttribute('src', data);
    }

    function getDataURI() {
        var data = photo.src;
        inputimg.setAttribute("value", data);
    }

    function createList(data) {
        var new_img = document.createElement("img");
        new_img.setAttribute('class', "picture_live" + i);
        new_img.setAttribute('src', data);
        list_live.appendChild(new_img);
        i++;
    }

    function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);

            var data = canvas.toDataURL('image/png;base64');
            photo.setAttribute('src', data);
            createList(data);
            getDataURI();
        } else {
            clearphoto();
        }
    }
});