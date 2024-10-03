 <!-- Cursos Populares Section -->
 <section class="bg-blue-500 py-16">
        <div class="container mx-auto py-12">
            <h2 class="text-4xl font-bold text-white mb-4 text-center">Nuestros Cursos Populares</h2>
            <p class="text-white mb-12 px-2 text-center">Descubre nuestros cursos más solicitados, cuidadosamente seleccionados para satisfacer las demandas de los estudiantes de hoy. Sumérgete en contenido atractivo diseñado para asegurar el éxito en cada paso de tu trayectoria educativa.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Primera card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ asset('build/assets/images/course.jpg') }}" alt="Diseño Web" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <span class="inline-block text-white text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">Diseño Web</span>
                        <h3 class="text-xl font-semibold mt-4">Diseño & Desarrollo Web</h3>
                        <p class="text-gray-600 mt-2">25 Clases | 187 Estudiantes</p>
                        <p class="text-lg font-bold mt-4">$560.00</p>
                    </div>
                </div>
                
                <!-- Segunda card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ asset('build/assets/images/course2.jpg') }}" alt="Wireframe" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <span class="inline-block text-white text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">Diseño UX/UI</span>
                        <h3 class="text-xl font-semibold mt-4">Wireframe & Prototipado</h3>
                        <p class="text-gray-600 mt-2">15 Clases | 225 Estudiantes</p>
                        <p class="text-lg font-bold mt-4">$270.00</p>
                    </div>
                </div>
                
                <!-- Tercera card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="{{ asset('build/assets/images/course3.jpg') }}" alt="Python" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <span class="inline-block text-white text-sm px-3 py-1 rounded-full" style="background: linear-gradient(90deg, #3b82f6 0%, #22c55e 100%);">Ciencia de Datos</span>
                        <h3 class="text-xl font-semibold mt-4">Ciencia de Datos con Python</h3>
                        <p class="text-gray-600 mt-2">30 Clases | 565 Estudiantes</p>
                        <p class="text-lg font-bold mt-4">$480.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>