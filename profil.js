// for hamburgermeny //
const hamMenu = document.querySelector(".ham-menu");
const offScreenMenu = document.querySelector(".off-screen-menu");

// Legger til en klikk-lytter til hamburgermenyen
hamMenu.addEventListener("click", () => {
  // Legger til eller fjerner klassen "active" på hamburgermenyen
  hamMenu.classList.toggle("active");
  // Legger til eller fjerner klassen "active" på off-screen-menyen
  offScreenMenu.classList.toggle("active");
});
// Henter referanser til HTML-elementene




// Kode for kundekonto.php //


// Simulert brukerdata (kan erstattes med data fra en database)
let userData = {
  name: "John Doe",
  email: "john@example.com"
};





// Funksjon for å vise brukerens profilinformasjon
function showProfile() {
  const profileInfo = document.getElementById('profile-info');
  profileInfo.innerHTML = `
      <h2>${userData.name}</h2>
      <p>E-post: ${userData.email}</p>
  `;
}

// Funksjon for å vise redigeringsfelt og skjule profilinformasjon
function editProfile() {
  const profileInfo = document.getElementById('profile-info');
  const editProfile = document.getElementById('edit-profile');
  profileInfo.style.display = 'none';
  editProfile.style.display = 'block';
  // Fyll inn redigeringsfeltene med brukerens eksisterende informasjon
  document.getElementById('name').value = userData.name;
  document.getElementById('email').value = userData.email;
}

// Funksjon for å lagre endringer i profilinformasjonen
document.getElementById('profile-fo').addEventListener('submit', function(event) {
  event.preventDefault();
  const form = event.target;
  // Oppdater brukerens informasjon basert på innsendte skjemadata
  userData.name = form.name.value;
  userData.email = form.email.value;
  // Vis profilinformasjonen igjen
  showProfile();
  // Skjul redigeringsfeltene
  document.getElementById('edit-profile').style.display = 'none';
  document.getElementById('profile-info').style.display = 'block';
});

// Kall funksjonen for å vise profilinformasjonen ved lasting av siden
showProfile();
