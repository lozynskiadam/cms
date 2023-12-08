/*
 * Add the right theme colors to the window object
 * so this can be used by the charts and vector maps
 * - light (default)
 * - dark
 */

let theme = {
  primary: "#696cff",
  secondary: "#6f42c1",
  tertiary: "#669ae5",
  success: "#28a745",
  info: "#20c997",
  warning: "#fd7e14",
  danger: "#dc3545",
  dark: "#153d77"
};

// For each stylesheet loaded on the page
$("link[href]").each(function() {
  let item = $(this)
    .attr("href")
    .split("/")
    .pop();

  switch (item) {
    case "dark.css":
      theme = {
        primary: "#687ae8",
        secondary: "#95aac9",
        tertiary: "#95aac9",
        success: "#0c9",
        info: "#19b5fe",
        warning: "#f7bc06",
        danger: "#f2545b",
        dark: "#28304e"
      };
      break;
  }
});

// Add theme to the window object
window.theme = theme;
