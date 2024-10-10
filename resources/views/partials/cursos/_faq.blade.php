<section class="bg-gray-100 py-20 mt-10">
    <div class="container mx-auto">
        <h2 class="text-3xl font-semibold text-center mb-8">Preguntas Frecuentes</h2>

        <div class="max-w-2xl mx-auto space-y-4">
            <!-- Pregunta 1 -->
            <div x-data="{ open: false }" class="bg-white p-4 rounded-lg shadow-lg">
                <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg font-medium">¿Cómo me inscribo en un curso?</h3>
                    <i :class="open ? 'fa-solid fa-minus text-1xl' : 'fa-solid fa-plus text-blue-500 text-1xl'"></i>
                </div>
                <div x-show="open" class="mt-2 text-gray-600" x-transition>
                    Puedes inscribirte haciendo clic en el botón "Inscribirme" en la página de detalles del curso. Te pediremos que completes el pago y luego tendrás acceso inmediato al curso.
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div x-data="{ open: false }" class="bg-white p-4 rounded-lg shadow-lg">
                <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg font-medium">¿Puedo acceder a los cursos desde cualquier dispositivo?</h3>
                    <i :class="open ? 'fa-solid fa-minus text-1xl' : 'fa-solid fa-plus text-blue-500 text-1xl'"></i>
                </div>
                <div x-show="open" class="mt-2 text-gray-600" x-transition>
                    Sí, todos nuestros cursos son accesibles desde cualquier dispositivo, ya sea computadora, tablet o teléfono móvil. Solo necesitas una conexión a internet.
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div x-data="{ open: false }" class="bg-white p-4 rounded-lg shadow-lg">
                <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg font-medium">¿Cuánto tiempo tengo acceso a los cursos?</h3>
                    <i :class="open ? 'fa-solid fa-minus text-1xl' : 'fa-solid fa-plus text-blue-500 text-1xl'"></i>
                </div>
                <div x-show="open" class="mt-2 text-gray-600" x-transition>
                    Una vez que te inscribes, tienes acceso de por vida a los cursos y a cualquier actualización que se haga a ellos.
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div x-data="{ open: false }" class="bg-white p-4 rounded-lg shadow-lg">
                <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                    <h3 class="text-lg font-medium">¿Los cursos tienen certificación?</h3>
                    <i :class="open ? 'fa-solid fa-minus text-1xl' : 'fa-solid fa-plus text-blue-500 text-1xl'"></i>
                </div>
                <div x-show="open" class="mt-2 text-gray-600" x-transition>
                    Sí, al finalizar cada curso recibirás un certificado digital que podrás descargar y compartir en tus redes profesionales.
                </div>
            </div>
        </div>
    </div>
</section>
