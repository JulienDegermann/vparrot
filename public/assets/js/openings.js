import OpeningTemplate from "./opening_template.js";
const openingSection = document.querySelector("#opening_setting");
const addOpening = document.querySelector("#add-opening");
const openingInputsContainer = document.querySelector(
    "#opening_setting #opening_inputs_container"
);

const removeOpenings = () => {
    const removeOpenings = document.querySelectorAll(".remove-opening");

    removeOpenings.forEach((element) => {
        element.addEventListener("click", (e) => {
            e.target.parentNode.remove();
        });
    });
};

const addOpeningHandler = () => {
    const openings = document.querySelectorAll(
        "#opening_setting .openings-inputs"
    );
    const node = document.createElement("div");
    node.classList.add("openings-input");
    node.innerHTML = OpeningTemplate(openings.length);
    openingInputsContainer.append(node);

    removeOpenings();
};

removeOpenings();

export const addNewOpening = () => {
    addOpening.addEventListener("click", addOpeningHandler);
};
