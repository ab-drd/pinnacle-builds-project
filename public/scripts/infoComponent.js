let infoTemplate = document.getElementsByClassName('infoTemplate');
document.getElementsByClassName('infoButt').addEventListener("click", ()=>{infoTemplate.classList.add('show');});
document.getElementsByClassName('infoClose').addEventListener("click", ()=>{infoTemplate.classList.remove('show');});
