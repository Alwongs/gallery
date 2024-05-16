<x-admin-layout>

    <div class="container">

        <header class="header">
            <h1>{{ __("dashboard.dashboard") }}</h1>
        </header>

        <section class="section dashboard-actions">
            <h2 class="dashboard-actions__title">
                {{ __("dashboard.actions") }}
            </h2>
            <ul class="dashboard-actions__body">
                <li class="dashboard-actions__item">
                    <form action="{{ route('remove-albums') }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="dashboard-actions__action" onclick="confirm('All Albums and Photos will be removed from database and file system!')">
                            {{ __("dashboard.remove_albums") }}
                        </button>
                    </form>
                </li>
            </ul>

        </section>

    </div>

</x-admin-layout>
