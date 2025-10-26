
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend/asset/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('backend/asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('backend/asset/js/main.js')}}"></script>

      <!-- JS (Preview + Add Skill Demo) -->
  <script>
    // Profile Picture Preview
    const profilePic = document.getElementById('profilePic');
    const previewImage = document.getElementById('previewImage');
    profilePic.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        previewImage.src = URL.createObjectURL(file);
      }
    });

    // Add Skill Dynamically
    const addSkill = document.getElementById('addSkill');
    const skillsList = document.getElementById('skillsList');
    addSkill.addEventListener('click', () => {
      const newSkill = document.createElement('div');
      newSkill.className = 'flex flex-col sm:flex-row items-center justify-between bg-gray-50 border rounded-xl p-4';
      newSkill.innerHTML = `
        <div class="w-full sm:w-1/2">
          <input type="text" placeholder="New Skill" class="border-b-2 border-gray-300 focus:border-indigo-500 outline-none w-full font-semibold text-gray-800">
          <input type="number" placeholder="Progress %" min="0" max="100" class="mt-2 w-full border border-gray-300 rounded-md p-1 text-sm focus:ring-2 focus:ring-indigo-400">
        </div>
        <div class="flex gap-3 mt-3 sm:mt-0">
          <button class="text-green-600"><i class="bi bi-check2"></i></button>
          <button class="removeSkill text-red-500"><i class="bi bi-trash"></i></button>
        </div>
      `;
      skillsList.appendChild(newSkill);
    });

    // Remove Skill
    skillsList.addEventListener('click', (e) => {
      if (e.target.closest('.removeSkill')) {
        e.target.closest('.flex').remove();
      }
    });
  </script>

