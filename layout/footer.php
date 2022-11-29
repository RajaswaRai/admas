<script src="js/bootstrap.bundle.min.js"></script>

<!-- ENABLE TOOLTIP BOOTSTRAP/POPPER -->
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

</body>

</html>