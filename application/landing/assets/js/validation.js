const HOST = 'http://localhost';

//Div
const client_nameDiv = document.getElementById("client_name");
const nit_inputDiv = document.getElementById("nit_input");
const pointDiv = document.getElementById("point_pru");
const teamDiv = document.getElementById("team");
const city_nameDiv = document.getElementById("city_name");
const promoterDiv = document.getElementById("promoter");
const rtc_numberDiv = document.getElementById("rtc_number");
const captain_nameDiv = document.getElementById("captain_name");
const check_labDiv = document.getElementById("check_lab");

//Input
const user_name = document.getElementById("user_name");
const nit = document.getElementById("nit");
const point_name = document.getElementById("point_name");
const team_name = document.getElementById("team_name");
const city = document.getElementById("city");
const promotor = document.getElementById("promotor");
const rtc = document.getElementById("rtc");
const captain = document.getElementById("captain");
const cbox1 = document.getElementById("cbox1");

const submitBtn = document.getElementById("send-button");

//Validaciones

//Submit
const submit = (e) => {
  e.preventDefault();

  const err = [];

  validateName(user_name, err);
  validateNit(nit, err);
  validateCheck(cbox1, err);
  validateNumbers(rtc, err);
  validatePoint(point_name, err);
  validateTeam(team_name, err);
  validatePromotor(promotor, err);
  validateCaptain(captain, err);

  if (err.length > 0) {
    e.preventDefault();
  } else {
    cbox1.value = 1;
    let formData = {
      client_name: document.getElementById('user_name').value,
      nit: document.getElementById('nit').value,
      point_name: document.getElementById('point_name').value,
      team_name: document.getElementById('team_name').value,
      city_name: document.getElementById('city_name').value,
      promotor: document.getElementById('promotor').value,
      rtc: document.getElementById('rtc').value,
      captain: document.getElementById('captain').value,
      checkbox: document.getElementById('cbox1').value,
      ip: document.getElementById('ip').value,
      hour: document.getElementById('hour').value,
      date: document.getElementById('date').value
    }
    console.log('formData', formData);

    function exito() {
      let datos = JSON.parse(this.responseText);
      window.location.replace("./pages/thanks.html");
    }
  
    function error(err) {
      console.log('Solicitud fallida', err); 
    }

    let xhr = new XMLHttpRequest();
    let json = JSON.stringify(formData);
    xhr.onload = exito;
    xhr.onerror = error;
    xhr.open("POST", `${HOST}/gabrica/application/landing/rest/api.php`)
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');

    xhr.send(json);
  }
};

submitBtn.addEventListener("click", submit);


const validateName = (name, err) => {
  removeChild(client_nameDiv, "requiredName");
  removeChild(client_nameDiv, "invalidName");
  if (name.value === "") {
    if (err) {
      err.push("requiredName");
    }
    createErrorMessage("Campo requerido", client_nameDiv, "requiredName");
  } else {
    if (!cadenaValida(name.value)) {
      if (err) {
        err.push("invalidName");
      }
      createErrorMessage(
        "No digites ningún caracter especial o Numeros",
        client_nameDiv,
        "invalidName"
      );
    }
  }
};

//check
const validateCheck = (cbox1, err) => {
  removeChild(check_labDiv, "requiredCheck");

  if (!cbox1.checked) {
    if (err) {
      err.push("requiredCheck");
    }
    createErrorMessage("Campo requerido", check_labDiv, "requiredCheck");
  }
};

//Numbers
const validateNumbers = (rtc, err) => {
  removeChild(rtc_numberDiv, "NotNumber");

  if (rtc.value !== "") {
    if (!numeroValido(rtc.value)) {
      err.push("NotNumber");
      createErrorMessage("Solo ingrese números", rtc_numberDiv, "NotNumber");
    }
  }
};

//Nit

const validateNit = (nit, err) => {
  removeChild(nit_inputDiv, "requiredNit");
  removeChild(nit_inputDiv, "invalidNit");
  if (nit.value === "") {
    if (err) {
      err.push("requiredNit");
    }
    createErrorMessage("Campo requerido", nit_inputDiv, "requiredNit");
  } else {
    if (!cadenaValidaNit(nit.value)) {
      if (err) {
        err.push("invalidNit");
      }
      createErrorMessage(
        "Los siguientes caracteres no se permiten #¿?,",
        nit_inputDiv,
        "invalidNit"
      );
    }
  }
};

//Point
const validatePoint = (point_name, err) => {
  removeChild(pointDiv, "invalidPoint");


  console.log("cadena", !cadenaValidaNit(point_name.value));
  if (!cadenaValidaNit(point_name.value)) {
    if (err) {
      err.push("invalidPoint");
    }
    createErrorMessage(
      "Los siguientes caracteres no se permiten #¿?,",
      pointDiv,
      "invalidPoint"
    );
  }


};

//Team
const validateTeam = (team_name, err) => {
  removeChild(teamDiv, "invalidTeam");

  if (!cadenaValidaNit(team_name.value)) {
    if (err) {
      err.push("invalidTeam");
    }
    createErrorMessage(
      "Los siguientes caracteres no se permiten #¿?,",
      teamDiv,
      "invalidTeam"
    );
  }

};

//Promotor
const validatePromotor = (promotor, err) => {
  removeChild(promoterDiv, "invalidPromotor");

  if (!cadenaValidaNit(promotor.value)) {
    if (err) {
      err.push("invalidPromotor");
    }
    createErrorMessage(
      "Los siguientes caracteres no se permiten #¿?,",
      promoterDiv,
      "invalidPromotor"
    );
  }

};

//Captain
const validateCaptain = (captain, err) => {
  removeChild(captain_nameDiv, "invalidCaptain");

  if (!cadenaValidaNit(captain.value)) {
    if (err) {
      err.push("invalidCaptain");
    }
    createErrorMessage(
      "Los siguientes caracteres no se permiten #¿?,",
      captain_nameDiv,
      "invalidCaptain"
    );
  }

};

const cadenaValida = (cadena) => {
  return /^[a-zA-Z\u00C0-\u017F ]*$/.test(cadena);
};

const cadenaValidaNit = (cadena) => {
  return /^[^#¿?,]*$/.test(cadena);
};

const numeroValido = (number) => {
  return /^[0-9]+$/.test(number);
};

const createErrorMessage = (text, div, id) => {
  let span = document.createElement("span");
  span.setAttribute("id", id);
  span.innerText = "";
  span.innerText = text;
  span.className = "text-danger";
  span.style = "width:70%";
  div.appendChild(span);
};

const removeChild = (div, id) => {
  for (let i = 0; i < div.children.length; i++) {
    if (div.children[i].id == id) {
      div.removeChild(div.lastChild);
    }
  }
};
