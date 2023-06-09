const urlPasted = document.querySelector(".input-value input");
const previewArea = document.querySelector(".preview-area");
const imgTag = previewArea.querySelector(".image");
const hiddenInput = document.querySelector(".hidden-input");

urlPasted.onkeyup = () => {
  let imgUrl = urlPasted.value;
  previewArea.classList.add("active");

  if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
    let vidId = imgUrl.split("v=")[1].substring(0, 11); // getting only the video id after the v=, 11 char. However, each
    // id is unique, so I need only the id to recognize the video from url
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // thumbnail url
    imgTag.src = ytThumbUrl; // passing youtube thumb inside the img src
  } else if (imgUrl.indexOf("https://youtu.be/") != -1) {
    let vidId = imgUrl.split("be/")[1].substring(0, 11); // getting only the video id after the be/, 11 char. However, each
    // id is unique, so I need only the id to recognize the video from url
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; // thumbnail url
    imgTag.src = ytThumbUrl; // passing youtube thumb inside the img src
  } else if (
    imgUrl.match(/\.(jpe?g|jpg|psd|tiff|svg|raw|png|gif|bmp|webp)$/i)
  ) {
    imgTag.src = imgUrl;
  } else {
    imgTag.src = "";
    previewArea.classList.remove("active");
  }
  hiddenInput.value = imgTag.src;
};

// https://i.ytimg.com/an_webp/${vidId}/mqdefault_6s.webp?du=3000&sqp=CLa7jaQG&rs=AOn4CLBtj9YZvLs9Pda1Cr0AfZLUID33sA
