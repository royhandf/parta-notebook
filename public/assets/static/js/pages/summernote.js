$(".summernote").summernote({
  tabsize: 2,
  height: 120,
});
$("#hint").summernote({
  height: 100,
  toolbar: false,
  placeholder: "type with apple, orange, watermelon and lemon",
  hint: {
    words: ["apple", "orange", "watermelon", "lemon"],
    match: /\b(\w{1,})$/,
    search: function (keyword, callback) {
      callback(
        $.grep(this.words, function (item) {
          return item.indexOf(keyword) === 0;
        })
      );
    },
  },
});

$(".custom-summernote").summernote({
  toolbar: [
    ["style", ["style"]],
    ["font", ["bold", "underline", "clear"]],
    ["fontname", ["fontname"]],
    ["para", ["ul", "ol", "paragraph"]],
    ["view", ["help"]],
  ],
});
