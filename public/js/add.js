const classes = document.querySelector('#classe');
const niveau = document.querySelector('#niveau');
const birthday = document.querySelector('#birthday');
const submit = document.querySelector('#submit');
const birthError = document.querySelector('#birth-error');
const nameError = document.querySelector('#nameError');
const prenomError = document.querySelector('#prenomError');
const numeroError = document.querySelector('#numError');
const nom = document.querySelector('#nom');
const prenom = document.querySelector('#prenom');
const numero = document.querySelector('#numero');
console.log(birthday);
const optionsParNiveau = {
  1: `
    <option value="CI">CI</option>
    <option value="CP">CP</option>
    <option value="CE1">CE1</option>
    <option value="CE2">CE2</option>
    <option value="CM1">CM1</option>
    <option value="CM2">CM2</option>
  `,
  2: `
    <option value="6eme">6eme</option>
    <option value="5eme">5eme</option>
    <option value="4eme">4eme</option>
    <option value="3eme">3eme</option>
  `,
  3: `
    <option value="2nde">2nde</option>
    <option value="1ere">1ere</option>
    <option value="Tle">Tle</option>
  `,
};

function afficherClasse() {
  const niveauSelectionne = niveau.value;
  if(niveau.value === 'Niveau' || classes.value === 'Choisir un niveau') {
    classes.innerHTML = 'Choisir un niveau';
    submit.disabled = true;
    return;
  }
  submit.disabled = false;
  const options = optionsParNiveau[niveauSelectionne] || `<option value="">Choisir un niveau</option>`;
  classes.innerHTML = options;
}
niveau.addEventListener('change', afficherClasse);

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


