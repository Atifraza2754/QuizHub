<!-- main header picture dropdown toggle -->

<script>
function toggleDropdown() {
  var dropdown = document.getElementById("dropdownContent");
  dropdown.style.display === "none" ? dropdown.style.display = "block" : dropdown.style.display = "none";
}

 function updateProfile() {
  return "hello";
  // Code to handle updating profile picture
  toggleDropdown(); // Close dropdown after action
}

function logout() {
  // Code to handle logout
} 
</script>
<!-- main header picture dropdown toggle -->


<!-- footer -->
<footer class="footer">
    <div class="container">
    <p>&copy; 2024 Attendance Management System (AMS)  All rights reserved.</p>
    </div>
</footer>

<script>
    // JavaScript to toggle footer visibility based on scroll position
    window.addEventListener('scroll', function() {
      var footer = document.querySelector('.footer');
      if (window.scrollY > 0) {
        footer.classList.add('footer-hidden');
      } else {
        footer.classList.remove('footer-hidden');
      }
    });
  </script>
  <!-- footer -->


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
