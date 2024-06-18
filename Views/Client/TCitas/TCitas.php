<?= headerCliente(); ?>
<?= navCliente(); ?>
<main class="main">
    <section id="reserva" class="mt-5">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <!-- Formulario de Reservación -->
                <form class="col-lg-8" data-aos="fade-up" data-aos-delay="150">
                    <div class="section-header text-center mb-4">
                        <h1 class="display-4">Reservación de Cita</h1>
                        <p class="lead">Dr. Antony</p>
                    </div>
                    <div class="mb-3">
                        <label for="fechaHora" class="form-label">Fecha y Hora de la Cita:</label>
                        <input class="form-control" type="text" id="fechaHora" name="fechaHora" readonly required>
                    </div>
                    <div id="horaSuggestions" class="mb-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="09:00">09:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="10:00">10:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="11:00">11:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="12:00">12:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="13:00">13:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="14:00">14:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="15:00">15:00</button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button type="button" class="btn btn-outline-primary suggestion" data-time="16:00">16:00</button>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-2">*Horario de acuerdo a los días de disponibilidad</p>
                    </div>

                    <div class="mb-3">
                        <label for="mascota" class="form-label">Nombre de la Mascota:</label>
                        <input class="form-control" type="text" id="mascota" name="mascota" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo-mascota" class="form-label">Tipo de Mascota:</label>
                        <select class="form-select" id="tipo-mascota" name="tipo-mascota" required>
                            <option value=""></option>
                            <option value="perro">Perro</option>
                            <option value="conejo">Conejo</option>
                            <option value="gato">Gato</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza de la Mascota:</label>
                        <input class="form-control" type="text" id="raza" name="raza">
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad de la Mascota:</label>
                        <input class="form-control" type="number" id="edad" name="edad" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select class="form-select" id="categoria" name="categoria" required>
                            <option value=""></option>
                            <option value="corte-uñas">Corte de uñas</option>
                            <option value="revision-consultorio">Revisión en consultorio</option>
                            <option value="cirujia">Cirugía</option>
                            <option value="revision-domiciliaria">Revisión Domiciliaria</option>
                            <option value="vacunacion">Vacunación</option>
                            <option value="consulta-nutricional">Consulta Nutricional</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="comentarios" class="form-label">Motivo de consulta:</label>
                        <textarea class="form-control" id="comentarios" name="comentarios" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Reservar Cita</button>
                </form>

                <!-- Comentarios -->
                <div class="col-lg-4">
                    <!-- Documentos a Tener en Cuenta -->
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header mb-2">
                            <h5>Documentos a Tener en Cuenta</h5>
                        </div>
                        <p>Aquí puedes agregar cualquier contenido adicional que desees mostrar al lado del formulario de reservación.</p>
                    </div>

                    <!-- Recomendaciones -->
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header mb-2">
                            <h5>Recomendaciones</h5>
                        </div>
                        <p>Aquí puedes agregar cualquier contenido adicional que desees mostrar al lado del formulario de reservación.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= footerCliente(); ?>