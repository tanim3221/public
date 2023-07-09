function Validate()
{
     var image =document.getElementById("image").value;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("image").focus();
              alert (document.getElementById("errorName5").innerHTML="Please choose only JPG, JPEG, PNG format images"); 
              return false;
           }
            var img = document.getElementById("image"); 
           // alert(img.files[0].size);
            if(img.files[0].size >  200000)  // validation according to file size
            {
            alert(document.getElementById("errorName5").innerHTML="Please choose image file maximum 200 KB.");
            return false;
             }
             return true;
      }
}


function Validate1()
{
     var image =document.getElementById("image").value;
     if(image!='')
     {
           var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)){ // validation of file extension using regular expression before file upload
              document.getElementById("image").focus();
              alert(document.getElementById("errorName5").innerHTML="Please choose only JPG, JPEG, PNG format images"); 
             
              return false;
           }
            var img = document.getElementById("image"); 
           // alert(img.files[0].size);
            if(img.files[0].size >  1024000)  // validation according to file size
            {
            alert(document.getElementById("errorName5").innerHTML="Please choose image file maximum 1 MB (1024 KB)");
            return false;
             }
             return true;
      }
}