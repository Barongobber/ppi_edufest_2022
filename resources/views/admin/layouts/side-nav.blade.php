<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
    style="background: var(--bs-gray-200);">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="../../../assets/icons/edufest-icon.png" alt="logo" style="height: 30px;">
            </div>
            <div class="sidebar-brand-text mx-3">
                <span style="font-family: Spartan, sans-serif;font-weight: 900; color: #D22028">Edufest</span>
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-dashboard')) active @endif" href="{{ route('admin-dashboard') }}">
                    <i class="fas fa-tachometer-alt" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Dashboard</span>
                </a>
            </li>

            <li class="nav-item" style="color: var(--bs-gray-800);">
                <a class="nav-link @if (Route::is('admin-speakers-index')) active @endif" href="{{ route('admin-speakers-index') }}"
                    style="color: var(--bs-gray-800);">
                    <i class="fa fa-microphone" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Speakers</span>
                </a>
            </li>
            <li class="nav-item" style="color: var(--bs-gray-800);">
                <a class="nav-link @if (Route::is('admin-faqs-index')) active @endif" href="{{ route('admin-faqs-index') }}"
                    style="color: var(--bs-gray-800);">
                    <i class="fa fa-question-circle" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">FAQ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-events-index')) active @endif" href="{{ route('admin-events-index') }}">
                    <i class="fa fa-calendar-check-o" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-participants-index')) active @endif" href="">
                    <i class="fa fa-users" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Participants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-partners-index')) active @endif" href="{{ route('admin-partners-index') }}">
                    <i class="fa fa-handshake-o" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Partners</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-sponsors-index')) active @endif" href="{{ route('admin-sponsors-index') }}">
                    <i class="fa fa-handshake-o" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Sponsors</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-article-index')) active @endif" href="{{ route('admin-article-index') }}">
                    <i class="fa fa-pencil" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Articles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::is('admin-docs-add')) active @endif" href="{{ route('admin-docs-add') }}">
                    <i class="fa fa-file-text" style="color: var(--bs-gray-800);"></i>
                    <span style="color: var(--bs-gray-800);">Documentation</span>
                </a>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"
                style="background: var(--bs-gray-800);color: var(--bs-gray-100);"></button>
        </div>
    </div>
</nav>
