const classeSelect = document.querySelector('#classe');
const niveauSelect = document.querySelector('#niveau');
const birthday = document.querySelector('#birthday');
const submit = document.querySelector('#submit');
const birthError = document.querySelector('#birth-error');
const nameError = document.querySelector('#nameError');
const prenomError = document.querySelector('#prenomError');
const numeroError = document.querySelector('#numError');
const nom = document.querySelector('#nom');
const prenom = document.querySelector('#prenom');
const numero = document.querySelector('#numero');


function validerFormulaire(event) {
  console.log('validerFormulaire');
  const regexDate = /^\d{4}-\d{2}-\d{2}$/;
  if (!regexDate.test(birthday.value)) {
    event.preventDefault();
    submit.disabled = true;
    birthError.innerHTML = 'La date de naissance doit être au format aaaa-mm-jj';
  } else {
    submit.disabled = false;
    birthError.innerHTML = '';
    nameError.innerHTML = '';
    prenomError.innerHTML = '';

  }
}

birthday.addEventListener('input', validerFormulaire);

function validerNom(event) {
  console.log('validerNom');
  const regexNom = /^[a-zA-Z]+$/;
  if (!regexNom.test(nom.value)) {
    event.preventDefault();
    submit.disabled = true;
    nameError.innerHTML = 'Le nom doit contenir uniquement des lettres';
  } else {
    submit.disabled = false;
    nameError.innerHTML = '';
  }
}
nom.addEventListener('input', validerNom);

function validerPrenom(event) {
  console.log('validerPrenom');
  const regexPrenom = /^[a-zA-Z]+$/;
  if (!regexPrenom.test(prenom.value)) {
    event.preventDefault();
    submit.disabled = true;
    prenomError.innerHTML = 'Le prénom doit contenir uniquement des lettres';
  } else {
    submit.disabled = false;
    prenomError.innerHTML = '';

  }
}
prenom.addEventListener('input', validerPrenom);

function validerNumero(event) {
  console.log('validerNumero');
  const regexNumero = /^[0-9]+$/;
  if (!regexNumero.test(numero.value)) {
    event.preventDefault();
    submit.disabled = true;
    numeroError.innerHTML = 'Le numéro doit contenir uniquement des chiffres';
  } else {
    submit.disabled = false;
    numeroError.innerHTML = '';

  }
}
numero.addEventListener('input', validerNumero);

const urlClass = "http://localhost:8000/classjs";
const urlNiveau = "http://localhost:8000/niveaujs";

async function getNiveaux(){
  const response = await fetch(urlNiveau);
  const niveaux = await response.json();
  console.log(niveaux.data);
  return niveaux.data;
}
getNiveaux().then(niveaux => {
  niveaux.forEach(niveau => {
    let option = document.createElement('option');
    option.value = niveau.id_niveau;
    option.innerHTML = niveau.libelle;
    niveauSelect.appendChild(option);
  });
  renderClass(niveaux[0].id_niveau);
});

async function getClasses(){
  const response = await fetch(urlClass);
  const classes = await response.json();
  console.log(classes.data);
  return classes.data;
}
niveau.addEventListener('change', (event) => {
  renderClass(event.target.value);
});

async function renderClass(id){
  const classes = await getClasses();
  classeSelect.innerHTML = "";
  classes.forEach(classe => {
    if(classe.id_niveau == id){
      let option = document.createElement('option');
      option.value = classe.id_classe;
      option.innerHTML = classe.libelle;
      classeSelect.appendChild(option);
    }
  });
  }