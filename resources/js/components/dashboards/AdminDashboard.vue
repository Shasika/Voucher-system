<template>
    <div>
        <h1>Admin Dashboard</h1>

        <!-- Sidebar -->
        <div class="container-fluid">
            <div class="row min-vh-100 flex-column flex-md-row">
                <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
                    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                        <div class="collapse navbar-collapse ">
                            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                                <li class="nav-item">
                                    <a class="nav-link pl-0 text-nowrap" href="#"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">Brand</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="#"><i class="fa fa-book fa-fw"></i> <span class="d-none d-md-inline">Link</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="#"><i class="fa fa-cog fa-fw"></i> <span class="d-none d-md-inline">Link</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="#"><i class="fa fa-heart codeply fa-fw"></i> <span class="d-none d-md-inline">Codeply</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="#"><i class="fa fa-star codeply fa-fw"></i> <span class="d-none d-md-inline">Link</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="#"><i class="fa fa-star fa-fw"></i> <span class="d-none d-md-inline">Link</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </aside>
                <main class="col bg-faded py-3 flex-grow-1">
                    <h2>Example</h2>
                    <p>
                        This is a Bootstrap 4 example layout that includes a Sidebar menu. On larger screen widths, the Sidebar is on the
                        left side and consumes the entire page height. It's vertically positioned down the screen. On smaller screen widths (like mobile phones and tablets), the Sidebar
                        moves to the top of the page, and becomes horizontally positioned across the page like a Navbar. Only icons are shown
                        on mobile to limit use of screen real estate.
                    </p>
                    <p>
                        This Sidebar works using only Bootstrap CSS classes and doesn't require JavaScript. It utilizes the responsive Navbar classes
                        to auto-magically switch the Sidebar orientation.
                    </p>
                </main>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

    </div>
</template>

<script>


export default {
}
</script>

<style  scoped>

</style>
