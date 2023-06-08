const classeSelect = document.querySelector('#classe');
const niveauSelect = document.querySelector('#niveau');
const disciplineSelect = document.querySelector('#g_discipline');
const title = document.querySelector('#title');
const nouveau = document.querySelector('#new');
const close = document.querySelector('#close');
const envoyer = document.querySelector('#envoyer');
const disciplineContent = document.querySelector('.discipline_add');
const btnAdd = document.querySelector('#btn-add');
const itemsList = document.querySelector('#items-container');
const maj = document.querySelector('#maj');
const inputGdisc = document.querySelector('#groupe-discipline');
const form = document.querySelector('.discipline-form');
const checkBtn = document.querySelector('#checkBtn');
const urlClass = 'http://localhost:8000/classjs';
const urlNiveau = 'http://localhost:8000/niveaujs';
const urlDiscipline = 'http://localhost:8000/disciplinejs';
const urlGroupeDisc = 'http://localhost:8000/groupediscjs';
maj.disabled = true;

let tableDiscipline = [];


disciplineContent.disabled = true;
title.innerHTML = 'Les discipline de la classe de CI';

maj.addEventListener('click', async (e) => {
  e.preventDefault();
  const request = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(tableDiscipline),
  };
  const response = await fetch('/discipline/gestion/delete', request);
  const result = await response.json();

  tableDiscipline.forEach((id) => {
    console.log(id);
    document.querySelector(`#discipline-${id}`).remove();
  });
  tableDiscipline = [];

  console.log(result);
});
async function getNiveaux() {
  const response = await fetch(urlNiveau);
  const niveaux = await response.json();
  return niveaux.data;
}
getNiveaux().then((niveaux) => {
  niveaux.forEach((niveau) => {
    let option = document.createElement('option');
    option.value = niveau.id_niveau;
    option.innerHTML = niveau.libelle;
    niveauSelect.appendChild(option);
  });
  renderClass(niveaux[0].id_niveau);
});

async function getClasses() {
  const response = await fetch(urlClass);
  const classes = await response.json();
  return classes.data;
}
niveauSelect.addEventListener('change', (event) => {
  renderClass(event.target.value);
});

async function renderClass(id) {
  const classes = await getClasses();
  classeSelect.innerHTML = '';
  classes.forEach((classe) => {
    if (classe.id_niveau == id) {
      let option = document.createElement('option');
      option.value = classe.id_classe;
      option.innerHTML = classe.libelle;
      classeSelect.appendChild(option);
    }
  });
}
async function getGroupDiscipline() {
  const response = await fetch(urlGroupeDisc);
  const result = await response.json();
  return result.data;
}
getGroupDiscipline().then((disciplines) => {
  disciplines.forEach((discipline) => {
    let option = document.createElement('option');
    option.value = discipline.id_groupe_discipline;
    option.innerHTML = discipline.libelle;
    disciplineSelect.appendChild(option);
  });
  envoyer.addEventListener('click', () => {
    if (inputGdisc.value === '') {
      alert('Veuillez saisir un groupe de discipline');
      return;
    }
    const request = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ libelle: inputGdisc.value }),
    };
    const response = fetch('/discipline/gestion/groupe', request);
    const result = response.json();
    console.log(result);
  });
});
async function getDiscipline() {
  const response = await fetch(urlDiscipline);
  const result = await response.json();
  console.log(result.data);
  return result.data;
}
disciplineSelect.addEventListener('change', (event) => {
  if (disciplineSelect.value == '4') {
    disciplineContent.value = '';
    disciplineContent.disabled = false;
    return;
  }
});

function changeTitle() {
  title.innerHTML = `Les discipline de la classe de  ${
    classeSelect.options[classeSelect.selectedIndex].text
  }`;
}
classeSelect.addEventListener('change', changeTitle);

function handleModal() {
  if (disciplineSelect.value == 'new') {
    document.querySelector('#modal').style.display = 'block';
  }
}
disciplineSelect.addEventListener('change', handleModal);
function closeModal() {
  document.querySelector('#modal').style.display = 'none';
  form.disabled = false;
}
close.addEventListener('click', closeModal);
envoyer.addEventListener('click', closeModal);

function addDiscipline(id) {
  if (disciplineContent.value !== '') {
    itemsList.innerHTML += `
  <li class="list-group-item border-0 item" id="discipline-${id}">
                <input onchange="handleChecked(this)" class="form-check-input me-3" id="checkBtn" type="checkbox" value="" data-id="${id}" checked />
                <span>${disciplineContent.value}(${disciplineContent.value
      .substr(0, 3)
      .toUpperCase()})</span>
              </li>
  `;
  } else {
    alert('Veuillez saisir une discipline');
    console.log(disciplineContent.value);
    return;
  }
}

function handleChecked(e) {
  if (e.checked) {
    e.parentElement.style.color = 'black';
    tableDiscipline.splice(tableDiscipline.indexOf(e.dataset.id), 1);

  } else {
    tableDiscipline.push(e.dataset.id);
    e.parentElement.style.color = 'red';
    maj.disabled = false;
  }
}

form.addEventListener('submit', function (e) {
  e.preventDefault();
  let formData = new FormData(form);
  let xhr = new XMLHttpRequest();
  xhr.open('POST', form.action, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      let json = JSON.parse(xhr.responseText);
      addDiscipline(json.data.id["MAX(id_discipline)"]);
    } else {
      console.log("Erreur lors de l'envoi de la requête."); // Affiche un message d'erreur si la requête a échoué (facultatif)
    }
  };
  xhr.send(formData);
});
