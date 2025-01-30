document.addEventListener("DOMContentLoaded", function() {
    // Affichage de la l imite de caractères pour la présentation
    let presentation = document.getElementById("presentation");
    let charCount = document.createElement("p");
    charCount.id = "charCount";
    presentation.insertAdjacentElement("afterend", charCount);
    
    presentation.addEventListener("input", function() {
        let maxLength = presentation.getAttribute("maxlength");
        charCount.textContent = `${presentation.value.length} / ${maxLength} caractères`;
    });
});
