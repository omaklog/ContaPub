<template>
    <v-app>

<!--        ==================formulario de domicilio===================-->

        <v-layout row justify-center>
            <v-dialog v-model="dialogDomicilio" transition="dialog-bottom-transition" max-width="800px">
                <v-card>
                    <v-toolbar dark color="primary">
                        <v-btn icon dark @click="dialog = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                        <v-toolbar-title>Settings</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn dark flat @click="dialog = false">Save</v-btn>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-form ref="formDomicilio">
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 sm6 md8>
                                    <v-text-field
                                        v-model="newDomicilio.nombre_vialidad"
                                        v-validate="'required|max:100'"
                                        :counter="100"
                                        :error-messages="errors.collect('Calle')"
                                        label="Calle:"
                                        data-vv-name="Calle"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-text-field
                                        v-model="newDomicilio.numero_exterior"
                                        v-validate="'required|max:10'"
                                        :error-messages="errors.collect('numero')"
                                        label="Número:"
                                        data-vv-name="número"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-text-field
                                        v-model="newDomicilio.numero_interior"
                                        v-validate="'required|max:10'"
                                        :error-messages="errors.collect('numero')"
                                        label="Número:"
                                        data-vv-name="número"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-text-field
                                        v-model="newDomicilio.nombre_asentamiento"
                                        v-validate="'required|email'"
                                        :error-messages="errors.collect('colonia')"
                                        label="Colonia:"
                                        data-vv-name="colonia"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-autocomplete
                                        v-model="newDomicilio.estado_id"
                                        @change="getListMunicipios()"
                                        v-validate="'required'"
                                        :items="estados"
                                        :error-messages="errors.collect('estado')"
                                        label="Estado:"
                                        item-text="nombre"
                                        item-value="id"
                                        data-vv-name="estado"
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-autocomplete
                                        v-model="newDomicilio.municipio_id"
                                        item-text="nombre"
                                        item-value="id"
                                        v-validate="'required'"
                                        :items="municipios"
                                        @change="getListLocalidades()"
                                        :error-messages="errors.collect('municipio')"
                                        label="Municipio:"
                                        data-vv-name="municipio"
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-autocomplete
                                        v-model="newDomicilio.localidad_id"
                                        v-validate="'required'"
                                        :items="localidades"
                                        item-text="nombre"
                                        item-value="id"
                                        :error-messages="errors.collect('localidad')"
                                        label="Localidad"
                                        data-vv-name="localidad"
                                        required
                                    ></v-autocomplete>
                                </v-flex>
                                <v-flex xs12 sm6 md4>
                                    <v-text-field
                                        v-model="newDomicilio.codigo_postal"
                                        label="Código Postal.:"
                                        data-vv-name="cp"
                                        required
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>

                        <v-btn @click="submit">submit</v-btn>
                        <v-btn @click="clear">clear</v-btn>
                    </v-form>
                </v-card>
            </v-dialog>
        </v-layout>



        <!--==================TABLA DE CLIENTES===================-->
<v-container  grid-list-md text-xs-cente>
    <v-layout  row wrap>
        <v-flex xs12>
            <v-btn @click="dialogCliente=true" fab dark small color="primary" right class="float-right">
                <v-icon dark>add</v-icon>
            </v-btn>
        </v-flex>
        <v-flex xs12>
            <v-data-table
                :headers="headers"
                :items="clientes"
                class="elevation-1">
                <template v-slot:items="props">
                    <td>{{ props.item.nombre }}</td>
                    <td class="text-center">{{ props.item.rfc }}</td>
                    <td class="text-center">{{ props.item.vencimientoFiel }}</td>
                    <td class="text-center">{{ props.item.fechaPemex }}</td>
                    <td class="text-center">{{ props.item.tipoContrato }}</td>
                    <td class="text-center">{{ props.item.movil }}</td>
                    <td>
                        <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                        >
                            add_location
                        </v-icon>
                        <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                        >
                            edit
                        </v-icon>
                        <v-icon
                            small
                            @click="deleteItem(props.item)"
                        >
                            delete
                        </v-icon>
                    </td>
                </template>
            </v-data-table>
        </v-flex>


    </v-layout>

</v-container>


<!--=========================================MODAL CLIENTE NUEVO O EDITADO=========================================-->


            <v-dialog v-model="dialogCliente" persistent max-width="600px">
                <v-card>
                    <v-toolbar dark color="primary">

                        <v-toolbar-title>Nuevo Cliente</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon dark @click="dialogCliente = false">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-card-title>
                        <span class="headline">Registro de cliente</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-form ref="formClient" >
                            <v-layout wrap>
                                <v-flex xs12 sm8 md8>
                                    <v-text-field v-model="newCliente.nombre "label="Nombre*" required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm4 md4>
                                    <v-text-field v-model="newCliente.rfc "label="R.F.C." required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm6 md4>
                                    <v-text-field v-model="newCliente.satPassword "label="SAT Password" required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm6 md4>
                                    <v-text-field v-model="newCliente.fielPassword "label="FIEL Password" type="text" required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm6 md4>
                                    <v-text-field v-model="newCliente.assitePassword "label="Assite Password" type="text" required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm6 md4>
                                    <v-text-field v-model="newCliente.vencimientoFiel "label="Vencimiento Fiel" type="date" required></v-text-field>
                                </v-flex>
                                <v-flex xs4 sm6 md4>
                                    <v-text-field v-model="newCliente.fechaPemex "label="Fecha PEMEX" type="date" required></v-text-field>
                                </v-flex>

                                <v-flex xs4 sm6 md4>
                                    <v-select
                                            v-model="newCliente.tipoContrato"
                                            :items="['Transitorio','Jubilado','Planta','Otro']"
                                            label="Tipo Contrato:"
                                    ></v-select>
                                </v-flex>

                                <v-flex xs4 sm6 md4>
                                    <v-text-field
                                            v-model="newCliente.movil"
                                            label="Celular:"
                                            type="number"
                                            required></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-textarea
                                            v-model="newCliente.notas"
                                            counter="250"
                                            name="notas"
                                            label="Notas:"
                                            value=""
                                    ></v-textarea>
                                </v-flex>
                            </v-layout>
                            </v-form>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click="dialogCliente = false">Close</v-btn>
                        <v-btn color="blue darken-1" flat @click="create()">Guardar</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>

    </v-app>

</template>

<script>
    export default {
        $_veeValidate: {
            validator: 'new'
        },
        data: () => ({
            dialogDomicilio:true,
            dialogCliente: false,
            estados:[],
            municipios:[],
            localidades:[],
            newDomicilio:{
                estado_id:'',
                municipio_id:'',
                localidad_id:'',
                nombre_vialidad:'',
                nombre_asentamiento:'',
                numero_exterior:'',
                numero_interior:'',
                codigo_postal:'',
            },
            newCliente:{
                vencimientoFiel:new Date().toISOString().substr(0, 10),
                nombre:'BENJAMIN MARTINEZ RAMIREZ',
                rfc:'MARB841213QP3',
                satPassword:'ASASASAS',
                fielPassword:'ASASAS',
                assitePassword:'ASASASAS',
                vencimientoFiel:'2019-01-01',
                fechaPemex:'2019-01-01',
                tipoContrato:'',
                movil:'9511586383',
                notas:'NUEVA NOTA'
            },
            headers: [
                {
                    text: 'Nombre',
                    align: 'left',
                    sortable: false,
                    value: 'nombre'
                },
                { text: 'R.F.C.', value: 'calories' },
                { text: 'Vencimiento FIEL', value: 'fat' },
                { text: 'Fecha PEMEX', value: 'carbs' },
                { text: 'Tipo Contrato', value: 'protein' },
                { text: 'Celular', value: 'iron' },
                { text: 'Opciones', value: 'iron' }
            ],
            clientes: [],
            name: '',
            email: '',
            select: null,
            items: [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4'
            ],
            checkbox: null,
            dictionary: {
                attributes: {
                    email: 'E-mail Address'
                    // custom attributes
                },
                custom: {
                    name: {
                        required: () => 'Name can not be empty',
                        max: 'The name field may not be greater than 10 characters'
                        // custom messages
                    },
                    select: {
                        required: 'Select field is required'
                    }
                }
            },
        }),

        mounted () {
            this.$validator.localize('en', this.dictionary);
            this.getListClientes();
            this.getListEstados();
        },

        methods: {
            submit () {
                this.$validator.validateAll()
            },
            clear () {
                this.name = ''
                this.email = ''
                this.select = null;
                this.checkbox = null;
                this.$validator.reset();
                this.$refs.formClient.reset();
            },
            getListClientes(){
                axios.get('list-clientes').then((response)=>{
                    this.clientes=response.data;
                });
            },
            getListEstados(){
                axios.get('api/estados').then((response)=>{
                    this.estados=response.data;
                });
            },
            getListMunicipios(){
                var data={
                    id:this.newDomicilio.estado_id
                };
                axios.post('api/municipios',data).then((response)=>{
                    this.municipios=response.data;
                });
            },
            getListLocalidades(){
                var data={
                    id:this.newDomicilio.municipio_id
                };
                axios.post('api/localidades',data).then((response)=>{
                    this.localidades=response.data;
                });
            },
            create(){
                axios.post('/clientes/create',this.newCliente)
                    .then(function (response) {
                        console.log(response);
                        this.clear();
                    }.bind(this))
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            editItem(item){

            },
            deleteItem(item){

            }

        },
    }
</script>
