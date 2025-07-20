<x-layouts.app :title="__('Configuración Avanzada - Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Configuración Avanzada</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Configuración técnica avanzada del sistema educativo RPG</p>
            </div>
            <div class="flex items-center space-x-3">
                <flux:button href="{{ route('admin.settings') }}" variant="ghost">
                    <flux:icon.arrow-left class="size-4" />
                    Configuración General
                </flux:button>
            </div>
        </div>

        <!-- Warning Alert -->
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
            <div class="flex items-center">
                <flux:icon.exclamation-triangle class="size-6 text-yellow-600 dark:text-yellow-400" />
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                        ⚠️ Advertencia de Configuración Avanzada
                    </h3>
                    <p class="text-sm text-yellow-700 dark:text-yellow-300 mt-1">
                        Los cambios en esta sección pueden afectar el funcionamiento del sistema. 
                        Solo modifica estos valores si entiendes completamente su impacto.
                    </p>
                </div>
            </div>
        </div>

        <!-- Advanced Configuration Forms -->
        <div class="space-y-6">
            <!-- Database Configuration -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🗄️ Configuración de Base de Datos
                    </h3>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">
                            <flux:icon.check class="size-3 mr-1" />
                            Conectado
                        </span>
                        <flux:button variant="outline" size="sm">
                            <flux:icon.arrow-path class="size-4" />
                            Probar Conexión
                        </flux:button>
                    </div>
                </div>

                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <flux:label for="db_host" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Host de Base de Datos
                            </flux:label>
                            <flux:input 
                                id="db_host" 
                                type="text" 
                                value="{{ config('database.connections.'.config('database.default').'.host') }}"
                                class="mt-1 block w-full"
                                readonly
                            />
                        </div>

                        <div>
                            <flux:label for="db_port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Puerto
                            </flux:label>
                            <flux:input 
                                id="db_port" 
                                type="text" 
                                value="{{ config('database.connections.'.config('database.default').'.port') }}"
                                class="mt-1 block w-full"
                                readonly
                            />
                        </div>

                        <div>
                            <flux:label for="db_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre de Base de Datos
                            </flux:label>
                            <flux:input 
                                id="db_name" 
                                type="text" 
                                value="{{ config('database.connections.'.config('database.default').'.database') }}"
                                class="mt-1 block w-full"
                                readonly
                            />
                        </div>

                        <div>
                            <flux:label for="db_username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Usuario
                            </flux:label>
                            <flux:input 
                                id="db_username" 
                                type="text" 
                                value="{{ config('database.connections.'.config('database.default').'.username') }}"
                                class="mt-1 block w-full"
                                readonly
                            />
                        </div>
                    </div>

                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                        <p class="text-sm text-blue-800 dark:text-blue-200">
                            <flux:icon.info class="inline size-4 mr-1" />
                            La configuración de la base de datos debe modificarse en el archivo <code>.env</code>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Cache Configuration -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🚀 Configuración de Cache y Rendimiento
                    </h3>
                    <div class="flex items-center space-x-2">
                        <flux:button variant="outline" size="sm">
                            <flux:icon.arrow-path class="size-4" />
                            Limpiar Cache
                        </flux:button>
                    </div>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <flux:label for="cache_driver" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Driver de Cache
                            </flux:label>
                            <flux:select id="cache_driver" class="mt-1 block w-full">
                                <option value="file" {{ config('cache.default') == 'file' ? 'selected' : '' }}>Archivo</option>
                                <option value="redis" {{ config('cache.default') == 'redis' ? 'selected' : '' }}>Redis</option>
                                <option value="memcached" {{ config('cache.default') == 'memcached' ? 'selected' : '' }}>Memcached</option>
                                <option value="database" {{ config('cache.default') == 'database' ? 'selected' : '' }}>Base de Datos</option>
                            </flux:select>
                        </div>

                        <div>
                            <flux:label for="session_driver" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Driver de Sesiones
                            </flux:label>
                            <flux:select id="session_driver" class="mt-1 block w-full">
                                <option value="file" {{ config('session.driver') == 'file' ? 'selected' : '' }}>Archivo</option>
                                <option value="cookie" {{ config('session.driver') == 'cookie' ? 'selected' : '' }}>Cookie</option>
                                <option value="database" {{ config('session.driver') == 'database' ? 'selected' : '' }}>Base de Datos</option>
                                <option value="redis" {{ config('session.driver') == 'redis' ? 'selected' : '' }}>Redis</option>
                            </flux:select>
                        </div>

                        <div>
                            <flux:label for="queue_driver" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Driver de Colas
                            </flux:label>
                            <flux:select id="queue_driver" class="mt-1 block w-full">
                                <option value="sync" {{ config('queue.default') == 'sync' ? 'selected' : '' }}>Sync</option>
                                <option value="database" {{ config('queue.default') == 'database' ? 'selected' : '' }}>Base de Datos</option>
                                <option value="redis" {{ config('queue.default') == 'redis' ? 'selected' : '' }}>Redis</option>
                                <option value="beanstalkd" {{ config('queue.default') == 'beanstalkd' ? 'selected' : '' }}>Beanstalkd</option>
                            </flux:select>
                        </div>

                        <div>
                            <flux:label for="cache_ttl" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                TTL de Cache (segundos)
                            </flux:label>
                            <flux:input 
                                id="cache_ttl" 
                                type="number" 
                                value="3600"
                                class="mt-1 block w-full"
                            />
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <flux:button type="submit" variant="primary">
                            <flux:icon.check class="size-4" />
                            Guardar Configuración
                        </flux:button>
                        <flux:button type="button" variant="outline">
                            <flux:icon.arrow-path class="size-4" />
                            Restaurar Valores
                        </flux:button>
                    </div>
                </form>
            </div>

            <!-- RPG System Advanced Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        ⚔️ Configuración Avanzada del Sistema RPG
                    </h3>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Experience Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">🎯 Sistema de Experiencia</h4>
                            
                            <div>
                                <flux:label for="base_exp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Experiencia Base por Misión
                                </flux:label>
                                <flux:input 
                                    id="base_exp" 
                                    type="number" 
                                    value="100"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="exp_multiplier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Multiplicador de Experiencia
                                </flux:label>
                                <flux:input 
                                    id="exp_multiplier" 
                                    type="number" 
                                    step="0.1"
                                    value="1.0"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="max_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nivel Máximo
                                </flux:label>
                                <flux:input 
                                    id="max_level" 
                                    type="number" 
                                    value="100"
                                    class="mt-1 block w-full"
                                />
                            </div>
                        </div>

                        <!-- Currency Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">💰 Sistema de Monedas</h4>
                            
                            <div>
                                <flux:label for="base_coins" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Monedas Base por Misión
                                </flux:label>
                                <flux:input 
                                    id="base_coins" 
                                    type="number" 
                                    value="50"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="daily_bonus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Bonus Diario
                                </flux:label>
                                <flux:input 
                                    id="daily_bonus" 
                                    type="number" 
                                    value="10"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="currency_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nombre de Moneda
                                </flux:label>
                                <flux:input 
                                    id="currency_name" 
                                    type="text" 
                                    value="Monedas Mágicas"
                                    class="mt-1 block w-full"
                                />
                            </div>
                        </div>

                        <!-- Mission Settings -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900 dark:text-white">📜 Sistema de Misiones</h4>
                            
                            <div>
                                <flux:label for="max_missions" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Misiones Simultáneas
                                </flux:label>
                                <flux:input 
                                    id="max_missions" 
                                    type="number" 
                                    value="5"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="mission_timeout" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Timeout de Misión (horas)
                                </flux:label>
                                <flux:input 
                                    id="mission_timeout" 
                                    type="number" 
                                    value="72"
                                    class="mt-1 block w-full"
                                />
                            </div>

                            <div>
                                <flux:label for="auto_assign" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Auto-asignación de Misiones
                                </flux:label>
                                <flux:toggle id="auto_assign" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <flux:button type="submit" variant="primary">
                            <flux:icon.check class="size-4" />
                            Guardar Configuración RPG
                        </flux:button>
                        <flux:button type="button" variant="outline">
                            <flux:icon.arrow-path class="size-4" />
                            Restaurar Valores por Defecto
                        </flux:button>
                    </div>
                </form>
            </div>

            <!-- Security Settings -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        🔒 Configuración de Seguridad
                    </h3>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <flux:label for="session_lifetime" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Duración de Sesión (minutos)
                            </flux:label>
                            <flux:input 
                                id="session_lifetime" 
                                type="number" 
                                value="{{ config('session.lifetime') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="password_timeout" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Timeout de Confirmación de Contraseña (segundos)
                            </flux:label>
                            <flux:input 
                                id="password_timeout" 
                                type="number" 
                                value="{{ config('auth.password_timeout') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="max_login_attempts" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Intentos Máximos de Login
                            </flux:label>
                            <flux:input 
                                id="max_login_attempts" 
                                type="number" 
                                value="5"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="lockout_duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Duración de Bloqueo (minutos)
                            </flux:label>
                            <flux:input 
                                id="lockout_duration" 
                                type="number" 
                                value="15"
                                class="mt-1 block w-full"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <flux:toggle id="force_https" />
                            <flux:label for="force_https" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Forzar HTTPS
                            </flux:label>
                        </div>

                        <div class="flex items-center">
                            <flux:toggle id="enable_2fa" />
                            <flux:label for="enable_2fa" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Habilitar 2FA
                            </flux:label>
                        </div>

                        <div class="flex items-center">
                            <flux:toggle id="log_queries" />
                            <flux:label for="log_queries" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Registrar Consultas SQL
                            </flux:label>
                        </div>

                        <div class="flex items-center">
                            <flux:toggle id="maintenance_mode" />
                            <flux:label for="maintenance_mode" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Modo Mantenimiento
                            </flux:label>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <flux:button type="submit" variant="primary">
                            <flux:icon.shield class="size-4" />
                            Guardar Configuración de Seguridad
                        </flux:button>
                        <flux:button type="button" variant="outline">
                            <flux:icon.arrow-path class="size-4" />
                            Restaurar Valores
                        </flux:button>
                    </div>
                </form>
            </div>

            <!-- Email Configuration -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        📧 Configuración de Email
                    </h3>
                    <flux:button variant="outline" size="sm">
                        <flux:icon.envelope class="size-4" />
                        Probar Email
                    </flux:button>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <flux:label for="mail_driver" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Driver de Email
                            </flux:label>
                            <flux:select id="mail_driver" class="mt-1 block w-full">
                                <option value="smtp" {{ config('mail.default') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                <option value="sendmail" {{ config('mail.default') == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                <option value="mailgun" {{ config('mail.default') == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                <option value="ses" {{ config('mail.default') == 'ses' ? 'selected' : '' }}>Amazon SES</option>
                            </flux:select>
                        </div>

                        <div>
                            <flux:label for="mail_host" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Host SMTP
                            </flux:label>
                            <flux:input 
                                id="mail_host" 
                                type="text" 
                                value="{{ config('mail.mailers.smtp.host') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="mail_port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Puerto SMTP
                            </flux:label>
                            <flux:input 
                                id="mail_port" 
                                type="number" 
                                value="{{ config('mail.mailers.smtp.port') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="mail_encryption" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Encriptación
                            </flux:label>
                            <flux:select id="mail_encryption" class="mt-1 block w-full">
                                <option value="tls" {{ config('mail.mailers.smtp.encryption') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ config('mail.mailers.smtp.encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="">Sin encriptación</option>
                            </flux:select>
                        </div>

                        <div>
                            <flux:label for="mail_username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Usuario SMTP
                            </flux:label>
                            <flux:input 
                                id="mail_username" 
                                type="text" 
                                value="{{ config('mail.mailers.smtp.username') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="mail_from_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Dirección de Envío
                            </flux:label>
                            <flux:input 
                                id="mail_from_address" 
                                type="email" 
                                value="{{ config('mail.from.address') }}"
                                class="mt-1 block w-full"
                            />
                        </div>

                        <div>
                            <flux:label for="mail_from_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre de Envío
                            </flux:label>
                            <flux:input 
                                id="mail_from_name" 
                                type="text" 
                                value="{{ config('mail.from.name') }}"
                                class="mt-1 block w-full"
                            />
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <flux:button type="submit" variant="primary">
                            <flux:icon.envelope class="size-4" />
                            Guardar Configuración de Email
                        </flux:button>
                        <flux:button type="button" variant="outline">
                            <flux:icon.paper-airplane class="size-4" />
                            Enviar Email de Prueba
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>

        <!-- System Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                🔧 Acciones del Sistema
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.arrow-path class="size-8 mb-2 text-blue-600" />
                    <span class="text-sm font-medium">Limpiar Cache</span>
                    <span class="text-xs text-gray-500">Elimina archivos de cache</span>
                </flux:button>

                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.database class="size-8 mb-2 text-green-600" />
                    <span class="text-sm font-medium">Backup Base de Datos</span>
                    <span class="text-xs text-gray-500">Crear respaldo completo</span>
                </flux:button>

                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.cog class="size-8 mb-2 text-purple-600" />
                    <span class="text-sm font-medium">Optimizar Sistema</span>
                    <span class="text-xs text-gray-500">Ejecutar optimizaciones</span>
                </flux:button>

                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.document-text class="size-8 mb-2 text-orange-600" />
                    <span class="text-sm font-medium">Generar Reporte</span>
                    <span class="text-xs text-gray-500">Reporte de sistema</span>
                </flux:button>

                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.shield class="size-8 mb-2 text-red-600" />
                    <span class="text-sm font-medium">Audit de Seguridad</span>
                    <span class="text-xs text-gray-500">Revisar configuración</span>
                </flux:button>

                <flux:button variant="outline" class="flex flex-col items-center p-4 h-32">
                    <flux:icon.arrow-up-tray class="size-8 mb-2 text-indigo-600" />
                    <span class="text-sm font-medium">Migrar Datos</span>
                    <span class="text-xs text-gray-500">Ejecutar migraciones</span>
                </flux:button>
            </div>
        </div>
    </div>
</x-layouts.app>
