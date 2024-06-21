const variants = $(".variant-product");
for (let index = 0; index < variants.length; index++) {
  const variant = variants[index];
  const choices = new Choices(variant, {
    delimiter: ", ",
    removeItemButton: true,
    duplicateItemsAllowed: false,
    editItems: true,
    allowHTML: true,
  });
}
