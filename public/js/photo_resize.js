function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1) + min);
}

var MAX_WIDTH = getRandomIntInclusive(100, 320);
var MAX_HEIGHT = getRandomIntInclusive(100, 180);
const MIME_TYPE = "image/jpeg";
const QUALITY = 0.7;

const input = document.getElementById("img-input");
input.onchange = function (ev) {
  const file = ev.target.files[0]; // get the file
  const blobURL = URL.createObjectURL(file);
  const img = new Image();
  img.src = blobURL;
  img.onerror = function () {
    URL.revokeObjectURL(this.src);
    // Handle the failure properly
    console.log("Cannot load image");
  };
  img.onload = function () {
    URL.revokeObjectURL(this.src);
    const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
    const canvas = document.createElement("canvas");
    canvas.width = newWidth;
    canvas.height = newHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0, newWidth, newHeight);
    canvas.toBlob(
      (blob) => {
        // Handle the compressed image. es. upload or save in local state
        // displayInfo('Original file', file);
        // displayInfo('Compressed file', blob);
        uploadPhoto(blob);
      },
      MIME_TYPE,
      QUALITY
    );
    document.getElementById("root").append(canvas);
    // console.log(blobToFile(file, 'resized_photo'));
    // console.log(uploadPhoto(blob));
  };
};

function calculateSize(img, maxWidth, maxHeight) {
  let width = img.width;
  let height = img.height;

  // calculate the width and height, constraining the proportions
  if (width > height) {
    if (width > maxWidth) {
      height = Math.round((height * maxWidth) / width);
      width = maxWidth;
    }
  } else {
    if (height > maxHeight) {
      width = Math.round((width * maxHeight) / height);
      height = maxHeight;
    }
  }
  return [width, height];
}

// Utility functions for demo purpose

// function displayInfo(label, file) {
//   const p = document.createElement('p');
//   p.innerText = `${label} - ${readableBytes(file.size)}`;
//   document.getElementById('root').append(p);
// }

function uploadPhoto(file) {
  const resized_photo = blobToFile(file, 'resized_photo');
  const input = document.createElement('input');
  // console.log(input);
  // console.log(sessionStorage);
  input.className = "custom-file-input";
  input.setAttribute('type', 'file');
  input.setAttribute('id', 'resized_photo');
  input.setAttribute('value', resized_photo);
  // document.getElementById('resized_photo').name = "resized_photo";
  input.setAttribute('name', 'resized_photo');
  document.getElementById('root').append(input);
}

function blobToFile(theBlob, fileName) {
  return new File([theBlob], fileName, { lastModified: new Date().getTime(), type: theBlob.type });
}

function readableBytes(bytes) {
  const i = Math.floor(Math.log(bytes) / Math.log(1024)),
    sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

  return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
}