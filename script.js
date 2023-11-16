// Buat fungsi untuk memunculkan modal
function showModal(id) {
    // Ambil elemen modal
    var modal = document.getElementById(id);
  
    // Set ukuran modal
    modal.style.display = "block";
    modal.style.height = window.innerHeight;
    modal.style.width = window.innerWidth;
  
    // Set posisi modal di tengah layar
    modal.style.left = (window.innerWidth / 2) - (modal.offsetWidth / 2);
    modal.style.top = (window.innerHeight / 2) - (modal.offsetHeight / 2);
  }
  
  // Buat fungsi untuk menutup modal
  function hideModal(id) {
    // Ambil elemen modal
    var modal = document.getElementById(id);
  
    // Set ukuran modal
    modal.style.display = "none";
  }
  