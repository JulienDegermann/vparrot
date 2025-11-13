console.log("umpoer");
const openings = document.querySelectorAll("#opening_setting .openings-inputs");
const openingSection = document.querySelectorAll("#opening_setting");
const addOpening = document.querySelector("#opening_setting #add-opening");

const addOpeningHandler = () => {
    console.log("fonctionne");
    const newOpening = openings[0].cloneNode(true);
    openings[0].parentNode.prepend(newOpening);
  };
  
  export const addNewOpening = () => {
    addOpening.addEventListener("click", addOpeningHandler);
};
