</main>
</div>
<footer class="footer mt-auto py-3 bg-dark-2 border-top border-primary border-opacity-25">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-muted">&copy; 2023 Expense Tracker. All rights reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-muted">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#" class="text-muted">Terms of Service</a></li>
                    <li class="list-inline-item"><a href="#" class="text-muted">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
    this.classList.add('active');
  });
});

</script>
@yield('bottomScriptsCustom')


</body>

</html>
