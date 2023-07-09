function show(file) { 
debugger;
            var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            alert('Please ensure you image is less than 2 MB.');
            $(file).val(''); //for clearing with Jquery
        } else {
			 if (file.files && file.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(file.files[0]);
        }	
        }
  }
