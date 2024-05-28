document.addEventListener("DOMContentLoaded", () => {
  let editorButtons = document.querySelectorAll(".editor-btn");
  let writingArea = document.getElementById("text-input");

  editorButtons.forEach((button) => {
    button.addEventListener("click", () => {
      button.classList.toggle("active");
      applyFormatting(button.id);
      updateHiddenArticleBody();
    });
  });

  function applyFormatting(command) {
    document.execCommand(command, false, null);
  }

  function updateHiddenArticleBody() {
    const hiddenArticleBody = document.getElementById("hidden-article-body");
    hiddenArticleBody.value = writingArea.innerHTML;
  }

  document.querySelector("form[name='create_article']").addEventListener("submit", function (event) {
    updateHiddenArticleBody();
  });
});
