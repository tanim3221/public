function show(file) { 
            var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 0.2) {
            alert('Please ensure you image is Maximum 200 KB.');
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
  
  
  
  function slip(file) { 
            var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 1) {
            alert('Please ensure you image is Maximum 1 MB.');
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
