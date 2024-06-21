FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginFileValidateSize,
  FilePondPluginFileValidateType,
  FilePondPluginImageExifOrientation
);

const multipleFilesFilePond = document.querySelectorAll(
  ".multiple-files-filepond"
);

const logoFilePond = document.querySelector(".logo-filepond");

multipleFilesFilePond.forEach((filePond) => {
  var productImages = JSON.parse(filePond.dataset.images || '[]');
  var fileItems = productImages.map(function(image) {
    return {
      source: image,
      options: {
        type: 'local'
      }
    };
  });
  FilePond.create(filePond, {
    credits: null,
    allowImagePreview: true,
    imagePreviewHeight: 150,
    allowMultiple: true,
    allowFileEncode: false,
    required: false,
    storeAsFile: true,
    allowFileTypeValidation: true,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    labelFileTypeNotAllowed: "Only PNG, JPG, JPEG files are allowed",
    allowFileSizeValidation: true,
    maxFileSize: "2MB",
    labelMaxFileSizeExceeded: "File is too large",
    files: fileItems,
  });
});

// kecilkan ukuran input file pond

FilePond.create(logoFilePond, {
  labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
  allowImagePreview: true,
  imagePreviewHeight: 50,
  storeAsFile: true,
  required: false,
  stylePanelLayout: "compact circle",
  styleLoadIndicatorPosition: "center bottom",
  styleButtonRemoveItemPosition: "center bottom",
  acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
  labelFileTypeNotAllowed: "Only PNG, JPG, JPEG files are allowed",
});
