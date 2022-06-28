<template>
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'Home'}">
                Home
            </router-link>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Master Data
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">
                    Lecturers
                </a>
                <a class="dropdown-item" href="">
                    Students
                </a>
            </div>
        </li>
    </ul>
</template>
