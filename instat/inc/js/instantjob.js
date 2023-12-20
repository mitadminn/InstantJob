// $(document).ready(function(){
//   $("#flip").click(function(){
//     $("#panel").slideToggle("slow");
//   });
// });

// CREATE FORM
// $('textarea').keyup(function() {
    
//   var characterCount = $(this).val().length,
//       current = $('#current'),
//       maximum = $('#maximum'),
//       theCount = $('#the-count');
    
//   current.text(characterCount);
 
  
//   /*This isn't entirely necessary, just playin around*/
//   if (characterCount < 70) {
//     current.css('color', '#666');
//   }
//   if (characterCount > 70 && characterCount < 90) {
//     current.css('color', '#6d5555');
//   }
//   if (characterCount > 90 && characterCount < 100) {
//     current.css('color', '#793535');
//   }
//   if (characterCount > 100 && characterCount < 120) {
//     current.css('color', '#841c1c');
//   }
//   if (characterCount > 120 && characterCount < 139) {
//     current.css('color', '#8f0001');
//   }
  
//   if (characterCount >= 140) {
//     maximum.css('color', '#8f0001');
//     current.css('color', '#8f0001');
//     theCount.css('font-weight','bold');
//   } else {
//     maximum.css('color','#666');
//     theCount.css('font-weight','normal');
//   }
  
      
// });
// CREATE FORM

// profile upload image
jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = 1;

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
// profile upload image


// check
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});