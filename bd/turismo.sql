PGDMP     7        
            s            turismo    9.3.4    9.3.4 @               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       1262    24973    turismo    DATABASE     �   CREATE DATABASE turismo WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Ecuador.1252' LC_CTYPE = 'Spanish_Ecuador.1252';
    DROP DATABASE turismo;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    5                       0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    5            �            3079    11750    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false                       0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    184            �            1259    25111    alojamiento    TABLE     �  CREATE TABLE alojamiento (
    codigo text NOT NULL,
    tipo_alojamiento text NOT NULL,
    nombre text,
    propietario text,
    direccion text,
    latitud text,
    longitud text,
    categoria text,
    n_hab numeric,
    n_plazas numeric,
    telefono text,
    correo text,
    sitio_web text,
    descripcion text,
    foto text,
    id_parroquia text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
    DROP TABLE public.alojamiento;
       public         postgres    false    5            �            1259    25154    atractivo_turistico    TABLE     �  CREATE TABLE atractivo_turistico (
    codigo text NOT NULL,
    nombre text,
    propietario text,
    direccion text,
    latitud text,
    longitud text,
    telefono text,
    correo text,
    sitio_web text,
    id_clima text,
    descripcion text,
    foto text,
    id_subtipo text NOT NULL,
    id_parroquia text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 '   DROP TABLE public.atractivo_turistico;
       public         postgres    false    5            �            1259    24992    cantones    TABLE     �   CREATE TABLE cantones (
    codigo text NOT NULL,
    nombre text,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
    DROP TABLE public.cantones;
       public         postgres    false    5            �            1259    25027    categoria_atractivo_turistico    TABLE     �   CREATE TABLE categoria_atractivo_turistico (
    codigo text NOT NULL,
    nombre text,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 1   DROP TABLE public.categoria_atractivo_turistico;
       public         postgres    false    5            �            1259    25036    clima    TABLE     �   CREATE TABLE clima (
    codigo text NOT NULL,
    nombre text,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
    DROP TABLE public.clima;
       public         postgres    false    5            �            1259    25203    comidas_bebidas    TABLE     �  CREATE TABLE comidas_bebidas (
    codigo text NOT NULL,
    tipo text NOT NULL,
    nombre text,
    propietario text,
    direccion text,
    latitud text,
    longitud text,
    categoria text,
    n_mesas numeric,
    n_plazas numeric,
    telefono text,
    correo text,
    sitio_web text,
    descripcion text,
    foto text,
    id_parroquia text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 #   DROP TABLE public.comidas_bebidas;
       public         postgres    false    5            �            1259    25217    fotografias_alojamiento    TABLE     �   CREATE TABLE fotografias_alojamiento (
    codigo text NOT NULL,
    foto text,
    id_alojamiento text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 +   DROP TABLE public.fotografias_alojamiento;
       public         postgres    false    5            �            1259    25231    fotografias_atractivos    TABLE     �   CREATE TABLE fotografias_atractivos (
    codigo text NOT NULL,
    foto text,
    id_atractivo text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 *   DROP TABLE public.fotografias_atractivos;
       public         postgres    false    5            �            1259    25245    fotografias_comidas_bebidas    TABLE     �   CREATE TABLE fotografias_comidas_bebidas (
    codigo text NOT NULL,
    foto text,
    id_comidas_bebidas text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 /   DROP TABLE public.fotografias_comidas_bebidas;
       public         postgres    false    5            �            1259    25001 
   parroquias    TABLE     �   CREATE TABLE parroquias (
    codigo text NOT NULL,
    nombre text,
    cod_canton text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
    DROP TABLE public.parroquias;
       public         postgres    false    5            �            1259    25068    subtipo_atractivo_turistico    TABLE     �   CREATE TABLE subtipo_atractivo_turistico (
    codigo text NOT NULL,
    nombre text,
    id_tipo text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 /   DROP TABLE public.subtipo_atractivo_turistico;
       public         postgres    false    5            �            1259    24983    tipo_alojamiento    TABLE     �   CREATE TABLE tipo_alojamiento (
    codigo text NOT NULL,
    nombre text,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 $   DROP TABLE public.tipo_alojamiento;
       public         postgres    false    5            �            1259    25045    tipo_atractivo_turistico    TABLE     �   CREATE TABLE tipo_atractivo_turistico (
    codigo text NOT NULL,
    nombre text,
    id_categoria text NOT NULL,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 ,   DROP TABLE public.tipo_atractivo_turistico;
       public         postgres    false    5            �            1259    25059    tipo_comidas_bebidas    TABLE     �   CREATE TABLE tipo_comidas_bebidas (
    codigo text NOT NULL,
    nombre text,
    estado numeric DEFAULT 1,
    fecha timestamp with time zone
);
 (   DROP TABLE public.tipo_comidas_bebidas;
       public         postgres    false    5            
          0    25111    alojamiento 
   TABLE DATA               �   COPY alojamiento (codigo, tipo_alojamiento, nombre, propietario, direccion, latitud, longitud, categoria, n_hab, n_plazas, telefono, correo, sitio_web, descripcion, foto, id_parroquia, estado, fecha) FROM stdin;
    public       postgres    false    178   JR                 0    25154    atractivo_turistico 
   TABLE DATA               �   COPY atractivo_turistico (codigo, nombre, propietario, direccion, latitud, longitud, telefono, correo, sitio_web, id_clima, descripcion, foto, id_subtipo, id_parroquia, estado, fecha) FROM stdin;
    public       postgres    false    179   e                 0    24992    cantones 
   TABLE DATA               :   COPY cantones (codigo, nombre, estado, fecha) FROM stdin;
    public       postgres    false    171   �}                 0    25027    categoria_atractivo_turistico 
   TABLE DATA               O   COPY categoria_atractivo_turistico (codigo, nombre, estado, fecha) FROM stdin;
    public       postgres    false    173   n~                 0    25036    clima 
   TABLE DATA               7   COPY clima (codigo, nombre, estado, fecha) FROM stdin;
    public       postgres    false    174   �~                 0    25203    comidas_bebidas 
   TABLE DATA               �   COPY comidas_bebidas (codigo, tipo, nombre, propietario, direccion, latitud, longitud, categoria, n_mesas, n_plazas, telefono, correo, sitio_web, descripcion, foto, id_parroquia, estado, fecha) FROM stdin;
    public       postgres    false    180   �                 0    25217    fotografias_alojamiento 
   TABLE DATA               W   COPY fotografias_alojamiento (codigo, foto, id_alojamiento, estado, fecha) FROM stdin;
    public       postgres    false    181   ��                 0    25231    fotografias_atractivos 
   TABLE DATA               T   COPY fotografias_atractivos (codigo, foto, id_atractivo, estado, fecha) FROM stdin;
    public       postgres    false    182   ��                 0    25245    fotografias_comidas_bebidas 
   TABLE DATA               _   COPY fotografias_comidas_bebidas (codigo, foto, id_comidas_bebidas, estado, fecha) FROM stdin;
    public       postgres    false    183   ȏ                 0    25001 
   parroquias 
   TABLE DATA               H   COPY parroquias (codigo, nombre, cod_canton, estado, fecha) FROM stdin;
    public       postgres    false    172   �       	          0    25068    subtipo_atractivo_turistico 
   TABLE DATA               V   COPY subtipo_atractivo_turistico (codigo, nombre, id_tipo, estado, fecha) FROM stdin;
    public       postgres    false    177   ��                 0    24983    tipo_alojamiento 
   TABLE DATA               B   COPY tipo_alojamiento (codigo, nombre, estado, fecha) FROM stdin;
    public       postgres    false    170   ��                 0    25045    tipo_atractivo_turistico 
   TABLE DATA               X   COPY tipo_atractivo_turistico (codigo, nombre, id_categoria, estado, fecha) FROM stdin;
    public       postgres    false    175   .�                 0    25059    tipo_comidas_bebidas 
   TABLE DATA               F   COPY tipo_comidas_bebidas (codigo, nombre, estado, fecha) FROM stdin;
    public       postgres    false    176   ʗ       ~           2606    25119    alojamiento_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY alojamiento
    ADD CONSTRAINT alojamiento_pkey PRIMARY KEY (codigo);
 F   ALTER TABLE ONLY public.alojamiento DROP CONSTRAINT alojamiento_pkey;
       public         postgres    false    178    178            �           2606    25162    atractivo_turistico_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY atractivo_turistico
    ADD CONSTRAINT atractivo_turistico_pkey PRIMARY KEY (codigo);
 V   ALTER TABLE ONLY public.atractivo_turistico DROP CONSTRAINT atractivo_turistico_pkey;
       public         postgres    false    179    179            p           2606    25000    cantones_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY cantones
    ADD CONSTRAINT cantones_pkey PRIMARY KEY (codigo);
 @   ALTER TABLE ONLY public.cantones DROP CONSTRAINT cantones_pkey;
       public         postgres    false    171    171            t           2606    25035 "   categoria_atractivo_turistico_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY categoria_atractivo_turistico
    ADD CONSTRAINT categoria_atractivo_turistico_pkey PRIMARY KEY (codigo);
 j   ALTER TABLE ONLY public.categoria_atractivo_turistico DROP CONSTRAINT categoria_atractivo_turistico_pkey;
       public         postgres    false    173    173            v           2606    25044 
   clima_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY clima
    ADD CONSTRAINT clima_pkey PRIMARY KEY (codigo);
 :   ALTER TABLE ONLY public.clima DROP CONSTRAINT clima_pkey;
       public         postgres    false    174    174            �           2606    25211    comidas_bebidas_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY comidas_bebidas
    ADD CONSTRAINT comidas_bebidas_pkey PRIMARY KEY (codigo);
 N   ALTER TABLE ONLY public.comidas_bebidas DROP CONSTRAINT comidas_bebidas_pkey;
       public         postgres    false    180    180            �           2606    25225    fotografias_alojamiento_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY fotografias_alojamiento
    ADD CONSTRAINT fotografias_alojamiento_pkey PRIMARY KEY (codigo);
 ^   ALTER TABLE ONLY public.fotografias_alojamiento DROP CONSTRAINT fotografias_alojamiento_pkey;
       public         postgres    false    181    181            �           2606    25239    fotografias_atractivos_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY fotografias_atractivos
    ADD CONSTRAINT fotografias_atractivos_pkey PRIMARY KEY (codigo);
 \   ALTER TABLE ONLY public.fotografias_atractivos DROP CONSTRAINT fotografias_atractivos_pkey;
       public         postgres    false    182    182            �           2606    25253     fotografias_comidas_bebidas_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY fotografias_comidas_bebidas
    ADD CONSTRAINT fotografias_comidas_bebidas_pkey PRIMARY KEY (codigo);
 f   ALTER TABLE ONLY public.fotografias_comidas_bebidas DROP CONSTRAINT fotografias_comidas_bebidas_pkey;
       public         postgres    false    183    183            r           2606    25009    parroquias_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_pkey PRIMARY KEY (codigo);
 D   ALTER TABLE ONLY public.parroquias DROP CONSTRAINT parroquias_pkey;
       public         postgres    false    172    172            |           2606    25076     subtipo_atractivo_turistico_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY subtipo_atractivo_turistico
    ADD CONSTRAINT subtipo_atractivo_turistico_pkey PRIMARY KEY (codigo);
 f   ALTER TABLE ONLY public.subtipo_atractivo_turistico DROP CONSTRAINT subtipo_atractivo_turistico_pkey;
       public         postgres    false    177    177            n           2606    24991    tipo_alojamiento_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY tipo_alojamiento
    ADD CONSTRAINT tipo_alojamiento_pkey PRIMARY KEY (codigo);
 P   ALTER TABLE ONLY public.tipo_alojamiento DROP CONSTRAINT tipo_alojamiento_pkey;
       public         postgres    false    170    170            x           2606    25053    tipo_atractivo_turistico_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY tipo_atractivo_turistico
    ADD CONSTRAINT tipo_atractivo_turistico_pkey PRIMARY KEY (codigo);
 `   ALTER TABLE ONLY public.tipo_atractivo_turistico DROP CONSTRAINT tipo_atractivo_turistico_pkey;
       public         postgres    false    175    175            z           2606    25067    tipo_comidas_bebidas_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY tipo_comidas_bebidas
    ADD CONSTRAINT tipo_comidas_bebidas_pkey PRIMARY KEY (codigo);
 X   ALTER TABLE ONLY public.tipo_comidas_bebidas DROP CONSTRAINT tipo_comidas_bebidas_pkey;
       public         postgres    false    176    176            �           1259    25264    fki_tipo_comidas    INDEX     E   CREATE INDEX fki_tipo_comidas ON comidas_bebidas USING btree (tipo);
 $   DROP INDEX public.fki_tipo_comidas;
       public         postgres    false    180            �           2606    25226    alojamiento    FK CONSTRAINT     �   ALTER TABLE ONLY fotografias_alojamiento
    ADD CONSTRAINT alojamiento FOREIGN KEY (id_alojamiento) REFERENCES alojamiento(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.fotografias_alojamiento DROP CONSTRAINT alojamiento;
       public       postgres    false    181    178    1918            �           2606    25010    canton_parroquia    FK CONSTRAINT     �   ALTER TABLE ONLY parroquias
    ADD CONSTRAINT canton_parroquia FOREIGN KEY (cod_canton) REFERENCES cantones(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 E   ALTER TABLE ONLY public.parroquias DROP CONSTRAINT canton_parroquia;
       public       postgres    false    1904    171    172            �           2606    25054    categoria_atractivo    FK CONSTRAINT     �   ALTER TABLE ONLY tipo_atractivo_turistico
    ADD CONSTRAINT categoria_atractivo FOREIGN KEY (id_categoria) REFERENCES categoria_atractivo_turistico(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 V   ALTER TABLE ONLY public.tipo_atractivo_turistico DROP CONSTRAINT categoria_atractivo;
       public       postgres    false    175    1908    173            �           2606    25163    clima    FK CONSTRAINT     �   ALTER TABLE ONLY atractivo_turistico
    ADD CONSTRAINT clima FOREIGN KEY (id_clima) REFERENCES clima(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 C   ALTER TABLE ONLY public.atractivo_turistico DROP CONSTRAINT clima;
       public       postgres    false    174    1910    179            �           2606    25254    comidas_bebidas    FK CONSTRAINT     �   ALTER TABLE ONLY fotografias_comidas_bebidas
    ADD CONSTRAINT comidas_bebidas FOREIGN KEY (id_comidas_bebidas) REFERENCES comidas_bebidas(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 U   ALTER TABLE ONLY public.fotografias_comidas_bebidas DROP CONSTRAINT comidas_bebidas;
       public       postgres    false    1922    180    183            �           2606    25240    id_atractivo    FK CONSTRAINT     �   ALTER TABLE ONLY fotografias_atractivos
    ADD CONSTRAINT id_atractivo FOREIGN KEY (id_atractivo) REFERENCES atractivo_turistico(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.fotografias_atractivos DROP CONSTRAINT id_atractivo;
       public       postgres    false    182    179    1920            �           2606    25212    id_parroquia    FK CONSTRAINT     �   ALTER TABLE ONLY comidas_bebidas
    ADD CONSTRAINT id_parroquia FOREIGN KEY (id_parroquia) REFERENCES parroquias(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 F   ALTER TABLE ONLY public.comidas_bebidas DROP CONSTRAINT id_parroquia;
       public       postgres    false    180    172    1906            �           2606    25168 
   id_subtipo    FK CONSTRAINT     �   ALTER TABLE ONLY atractivo_turistico
    ADD CONSTRAINT id_subtipo FOREIGN KEY (id_subtipo) REFERENCES subtipo_atractivo_turistico(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 H   ALTER TABLE ONLY public.atractivo_turistico DROP CONSTRAINT id_subtipo;
       public       postgres    false    177    1916    179            �           2606    25120 	   parroquia    FK CONSTRAINT     �   ALTER TABLE ONLY alojamiento
    ADD CONSTRAINT parroquia FOREIGN KEY (id_parroquia) REFERENCES parroquias(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 ?   ALTER TABLE ONLY public.alojamiento DROP CONSTRAINT parroquia;
       public       postgres    false    172    1906    178            �           2606    25173    parroquia_id    FK CONSTRAINT     �   ALTER TABLE ONLY atractivo_turistico
    ADD CONSTRAINT parroquia_id FOREIGN KEY (id_parroquia) REFERENCES parroquias(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 J   ALTER TABLE ONLY public.atractivo_turistico DROP CONSTRAINT parroquia_id;
       public       postgres    false    1906    172    179            �           2606    25125    tipo_alojamiento    FK CONSTRAINT     �   ALTER TABLE ONLY alojamiento
    ADD CONSTRAINT tipo_alojamiento FOREIGN KEY (tipo_alojamiento) REFERENCES tipo_alojamiento(codigo);
 F   ALTER TABLE ONLY public.alojamiento DROP CONSTRAINT tipo_alojamiento;
       public       postgres    false    1902    170    178            �           2606    25077    tipo_atractivo    FK CONSTRAINT     �   ALTER TABLE ONLY subtipo_atractivo_turistico
    ADD CONSTRAINT tipo_atractivo FOREIGN KEY (id_tipo) REFERENCES tipo_atractivo_turistico(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 T   ALTER TABLE ONLY public.subtipo_atractivo_turistico DROP CONSTRAINT tipo_atractivo;
       public       postgres    false    1912    175    177            �           2606    25259    tipo_comidas    FK CONSTRAINT     �   ALTER TABLE ONLY comidas_bebidas
    ADD CONSTRAINT tipo_comidas FOREIGN KEY (tipo) REFERENCES tipo_comidas_bebidas(codigo) ON UPDATE CASCADE ON DELETE CASCADE;
 F   ALTER TABLE ONLY public.comidas_bebidas DROP CONSTRAINT tipo_comidas;
       public       postgres    false    180    1914    176            
      x��Z�n�Ɩ}f���0������`�D�ev(Q!%#6hP$�V]<�t���1@�0�����|�l�.��%'�?X�%���e��w���新�cKn۶,��;�,JӐ�g&�M[X�lRZRN�Br#N2��a�A�>�>`}�>���(L�L�����L/�J�8V���1vF�Qԏ��_z�2���׽t������2laHߓҴ�7�y1[��X}����x^�p�e�XXa��ͫ�(�?��օ��p�my͝n�\�GZܵm�K�u'yY:'�f
��8�Y7d�q<�<0 w�{$��Y�R�H��.1�q��@�&�z;�QHx�-߯�
_��oc5JC���	1� �������?�p�/��l>�7��Z/��e�Z\U��v7/����j[�?�����C>�m�VK���W��ŬZnW��6���b�q��e������v17.�͋KYV-��7������G6Z�����u��]��z�9/W����9��{�!�H뚻��1���3��x���IϨ8|��T\���qڡh�{���G�D�����ׄ��gX����Y.��vW�0y�Z<��Y��97�|~�ϫO��\�WB:�s۴��'�<+��Z�#+�\j+L�3��'��W���&F��R+a=�a�x�}��lt���S�8�I�u�Mؤ��O�ݪTG�)8PG�k��F`@!�0�
�ܗV��o���j�q7+�����j�}���zV���c}U���a��a�����j�}@4_�'�6����:b/y�{\�kS���C�ZdR�ia�����9?T�Fo��X�·��L��q���Xv5�%ߍ��z��-���Ɲ&�\<G>�7LmTפl?�ů�}�͔u�S/�y%ObK�;�0V�����@��%O���a:�j��g˖�,���ıG���X��h�ky��e�Mi��D��D��W���B���� ��&��(aFp�;���:�m`���M�۾h�q�5�*�з�q> ��� 9�U��S^��I@k�5Zݟ�����y�זK��v�̰�hq�5B6YGx��O%�v�I�$�0���R�+b-���`��0I{�`uC8�]�b���nT����'<W6n��M@gz?��=Dgө��('���&L
n �� B"!A^�I7%�pO� S�:�ht؝9�"&k���T��{N5����E�K������MY#��(9SY�D�-�7T]�$ӄ�'Q�w��]��ԵS��*��\��b����=f�0�q�ܫqL
o�ONW�s$��~��^J�����]:.���.�#_'��R�6�$��s8��n� ����nyG��۵�<^z��4y k��IudA<
Y�{�FD*��VC�A���Ǟ��n�/\�g9��ֹ�5L�C�y�55՛�N�]��y.;$s��HC�8G7l}ѯ�8��Mz!	U'�ԅٖ�g6������)�\��s��#淁��W�ñJ�$�Z�vRu��WƐ���d�<��pZ5�T0�mc�u�ך0�3��E�}a��Qp\.�.d�p}��$�!@�7�<G7a�=��%��4�ӭbR&"�CM�=�T�m� �7޶�p�N;G����Au���uմ�jQ���%x�#�W��d	�x��~���w��.{�::l�i��Q�[z�4��K�<�V�܀,����`�M�IӜS9�b�A�@td�C4��+$Tq���0�D6G����/��FE�r�q��u�VE
Ī.n�=���}�z.:|�F:A~O��e\�ḛ�!�Ѫr��B��Z߫LtVQ܁�#����U��� �(}���\û�N�C_��S�SD�8ȭ1�m�r_ctQ��0�V���M��tmh1�[�Q�s����.����H�P�����:Ƕ�k�i:EPI3�&D���?[�������B�$hV�H��a�r��&�B8�mPͣ��R�2#H�$7i"�I�~!B��-��~kZ �>+.T\ ��_�4��,�����t�Z��|����n|���y�c�]x��My�m�_�GZFX�,�lHb�q�9@�&��7@vCS��.�Zo{{]���j�{����k���5��4-�-�����
��ЇlXʢ�c6��l�y��Y���f��m�5++�ٱj��˧��Y�d�ݼx���%���j�v�Y��x�q�b��z���.�笘�ʼ�|�|���6��eE��3�c/�al�*��2߰��qEO�C�|}�6�QW�G]oض�t����f[����<K~m;Gn�6��ʙTG]ృ�1r�x���� o�:c���֝�e:-�Z���X\�v�|���_��P��F���X�o:S�Ě�pp�:)�g��$�§O�d͌���g�v���>������O��~�i�U���ǫ�l'P��Z�tQO_u0���@�3��H�����B��,����I��ޢ�7�:���}�ҋU��������3���7�i�R"��qn8����:_j���j����ՊB⥵�[�˯�1��l���"���ځ�?Mֱ��M������Mid�v]QR���՚��ͬ�t_��L_Tk��e��G�7�K���b��m�'�����^����Ŭx�Z�kY�^\6gy��V��j�]�x7�0u���rK���b��`�=2A�tAc�]-���^ ��6X���=����ch����f�G��W�o�z�q�_"��be?��c�KV�uUTkm�|K�">1�0��z�r�3�rAC���M��n�KX�"_j�3xv[_V���U�����ϫ��j}��/�|�ZW{�s0|��sZ�r��{�Qa�OpS���<����\���|M����[����~Bng�Wa��߿���������j�-����Y�g�kq�~`b�~v���)��7JR��f�s�S�f�okh���[E3wP�A�=�j4����n;s��w�����p���h}.8�h�p��<--24ʠ�!�Q7���v<�^����1ڭ���(N�R�ʞ�yӁ�1��j�Ҷ̖�H��-EQ��@D���7����mw�Js���x����V(Y��=��;�,#��\\s~d$Ӫ�����tH��Q(�ݳp�F�5��~��#� �"�a�n�*��tܴ키���l4B�����i�X�u�ѳ1�*�q��pV+���E�O
���f�G�ke)�$6���U1�tݲ���	r"B�u��݋��Cs�c|��I����$4���٘�YB��ߝ�����et�29Ti�.���f�����z��^���$m�P��u�|�2�5B�_�>Hq��k�'���̓i�B]�X�i���P"�۵tT��d�%u{z
h��a1�Q��������y�9L��yֳ#=��Cq���Tp��R!\��縣pO���R4A}E��N��3��ads�9Lo��4�%u�N �E꫻5(	-���F��R�f�o�x��ž�\;���%f`Fr�0[V�]� �A���q4�B����;�,���Q'F�A
jEާ�WѬ�N������X���r�u��k���4���*;/�C��V��2ˈ�,�CՉ���/��j@IJ%f��ڙ�%=v� �mXoYҖ��Xᡫ~v�4LQ��̱ltr�������W�Il�֫�#�"���t���U�.��Ӵ�ӯ�JBLU��rږ�ƣ�o���s��T�5?FUo=�|��N�ӨnH�4����뗞�#	���<������f���TT74,��K�"��@T�{�J��"Nlү�B*D�[)U�����6�ӆcjI�X���3��1_�`4�ԣ]��j7S|���5.W�}���1(ūb(eC&�	Zn���ĥ�N4Rs3��-���1�u� h���P9Zށf�9|!�e����;�FQc�j_9>=����1����|�I��iY��T�O��=��.h�3�FП��4��HZ�_�jO�/�����-Ox��G��V�,_�|9��Id:9$1���Jx�9��6��|§�:�§%����%4P�-�\�n\�c#��՞y�l'|4��O�    �cx�h��U5)�/�	������l��'7�����9�:U�b�P�h`ܪ(��4&��f9���� ����A.M�3�G���v��b�ѡ���<ŔⰒᑖ>�򲥘�E5Y���{���c����O8�x��˿�_Uwy%L�	���.Z���f�}��� d&ZJ���e�L��c��M�8����1Y����`T(�I��;��(�wt#���e���5#y&䎻/��F�RBY����gC�|9��b�)Vt:�j�G#pA��`� ����.���sdW+g��E�v���T��X�6GF�����<��ť1	#5�-��#CPv6���gJ�+�}�Q�ed�>DS��=OP%��#�3��z�K/�C�! ��m��s�!�R��
ګ{i:���6�q_�5�cA&��
'Dp�"��r^��+��P�sꢸ�/���b�	:�TA(PG�G���=�l�Uz�����=�l�V��Y�$
h�^\<��>���!O]�+��4&�Z'úu�	{��a/��|�Ĝ��S~$u#�m�T'(*)��^
I�2.�#� j2kh6l�N�8��� �ФY�+�&�i�Y_�B͹H2@����h]�T�qz���IA���6L�Mwf��Q$����Bo��Vغ�����mD�1�F8�,Q�v��<<�`	d��ҥ�r�/�#�*Pip:OrKE�:�v�N��.4g�A��!��L;�U�>H�S		���X���`��h⩗�\h;��r][�<�<�"å�����g�E�`<��8Rk����|���@K��            x��[��ɕ�1_����`�F�e� �Y4��GC#���zUP=z�m�L26�mHM4�M�%��|ɞs3�&�#�a���|�{��^��n��j5κ��Y����3�u��jV���h�Mw��h���.F���x����7������z4���*_�x�c���Y=��棅Z|9U������h>⯚�0b�Q?k���J�߯�����R�������/���ۺ�S�6���e��_�q`�X��n�̋4�6I��q�ĵ����K��&�q����kw:0��,��nb�Π�m��U���u�2��Dz���w��*0�d�Qy�M���{��2U�*Y�~��?�1*/'� x$�S��7*ͣzP�	3�w�H2�'�D��q�ڦ�6�����#E:S[��?&VY��d�7Gx��\�`&�C����DZ]E��&�M��P0������;4^t���c��1&�(�4��p�#�ӏBޗ�,���c���ΤIV� _Gj��	֨B��%��T��E����K�3(�<�+-�q?1�e��*�:�bP����xP��K�o�'�vKdZ���a�d��JgXڝ���!6I`�7Yb+B7��N>�D�f�:�W��_�����o_�>���N�n�v�#.���%�����_��l���Ŷ��n�,�A�)Wk�N��R���n�{Vkt�8��p2`G/[��T�7�B�]�g�oQy�]\+����9�u�m�ȩa7�aw���Y���/F�s��V�u�ug6#Mq��h�8�{����G�>sP���_�ե^F�d��üW���Ob���ZF��bk3ܭqnyx�U�abg�8����Ü�a�9��&H�0�-���jUXČ7b�A�����a��QGf���n�?�!��u<�&��B]���\ѹ����
��t�e�c�߇9(���`T��%,�U>o���p��^���!��b���<�������\,{�V�i��0�kڛ�M�;�;Z��|v5�5M`b"�j����⌋<$|��{}������NR���y���¸��ǀ�a�q[���~�{���8!f��z$>U�~ ɡx3��k�P�����VӻR@�ɠ�� f�'�;�.���7��#f��/Qup��2�qBG��dBk=��˅y�lV���c/�Zc�i� T<��H1(�?*�:�>�_����5b��ι�&��5a.����8J}r�u5��\�m(F������%?�C�㗳�7��ı;���p��0'��{�z�LZ���_U��/��=[��_{��!:O���i�>�Z5�x�fqa�SE���Z5�ݣ+q� ���B�ܚ ���Q��M�F�;8[����q����|��}����y�{����〦t��`UzO�����:{6ͧ�+7��p|�Mx��f2��iZ�8?iv[=��^��h}?�u�k���\j�K3�$AY��,O��ڐ�Us�n� pݏ�� K�o���F[S*=?���T Xl�~��	VU �����V�����n�t�����-U�b+�{ �o��7���k���o�j!�#y���;D�N:�WQQ"m�b������Jo#���b����X򲘓��'Xy��� �d�Ga�o���M~�{�@I��pX*(��`��T`&��&�Q9:R"lv�ŒߨM�� /��pdrDLӺ�����I�vs���x��~���Ȇ��&B����n�cr�6�s��q,'�L$��s�b�2��Pm$m$*6��3Ǌ31%��<�zqh:T���8��ЀU���1���um���Gp|`Y�)�F��#_`�˗������,��A��Hm�i�jKq����bz�ob���.��/��mԊ�F�a)���{_G��[g�⨣�����VM\��Z=�^u�vl`H�ʓ�Q��1�#��e���Gɣ~��D�7Nr�l #�-W�v��98�w� d�ݲ$�?�fЫG���)L��ۥ7g������y��Ͻ�p�3�}]�׉r̩D�Wj8��]yߌ	���2�������|��)�H_���'��(˓c��Ҁ�19� l`�%Y�%�Bl�7��f��H��rDz�#@��Drz/^���cBb�W�Ibx�/��yb��	��I��P�A�V/-i�l�%<�$)x�j�^�=LN������\"*�(hf`~E��� 3�q`�{GD��{K�Z"�� ���$۽Sޣ�O��z?)#��U��+l�n��;~`��#�IT?��Ñ���&.V��Ь1;��@�*p���T�c=�U"��F9H��m���Pd��̤`��i�d��om���B��ЈF[���ޓ6K ��Vⅻ�-��`ck����"��ߪE��/ u�G���)Wq�.��v�'��BgO�!Q����CF�rk����B�X��r��CYҁ��C1�"�޽wRF�J@���	O\�"�=�l�i����і`-uu��_�}�OiB�1,8&�L�{��?��^����K�w�$����e���w�#�d�"ʈ|�a*'�&�\|�s�
��uH�S�_މ���@+}��÷N�S��a�7�ad��Hz
�g6���6Q��A\|��C^�.��ik�d_����
��D�����O�/Ǡ�:�كKq����Фd�+���|c��S��ykpS�^�������j!G�3C"?�.<	.7�)b��ދY��� w�k��z���4Z͟SH��Ko�?30
|�| ��{�I(�Q\��k���Y�~��p���N��c$k�&�9����e���NN��9*&��[�JexDF*���������@�
9��?~�Sp=o 쉒�����̻M��fEq�8�j��q閯����q5{��=���[�'y- �l�{ƴ�����b4S���7��d���MY�R��م��˫�������^ ����[\c�8���w�'rOo&�7sO��7��l>f��l4�ʻ��e���|ΤXMw�;��f��x��˱c'�c���f�]��^��9�dSd&��p������RS�@�w����q�Q��Q�h�=�qZ���o�X�C�����|虉��f�>ƍi*��t���D��P����D+\�q<fWƑ�H���Ղ���B��QHŷ�)��L���b�<5�^�T��-`��݉� -���!
'6c�ƀ�}(qZ�;�R��G{#�"Zl��NJ�Hm�U��**_����_��eY���!eu'{"�Z��M��v��TBwocD���l7~���)�(C����m��W�u�r�_���aֆ��Ud}lX�l�#މ�W`4I�g#<`�{R@���3�mp�9�E"�or���@���p�/
� ˡe`B�M���'�"��Z�BlJ�hJB�j�nk�d��y�LM��y�'.�)pK��KJ��Q�o� )���\4�:3��'��V>>�^2�k۵�n��U@���1~((m?�L1�7��O�\��nK�[�j5��d��q
�|B`��-�g���_LF������[�R����/�3����(������9�@��e����i��l>ʎ��[��,��gU��569�5�����'�I(�(�੦�\ch�-jVX
S��]��	�A�l�40{ԸB�-~�ecK�8���$oi���"�t:/������ߗt_-r�S��|���c=3QNw�g��*Y{rFc��CGrA�3��{cŹR��+Ԧs-�*ʋ ��N��i�B�M��A�8/�e�N�Y{�~s$_DV������M�b؋��Ӓ���S���`E�c�MĊM�*pG2����9Tr�,�`���J���ڛ�U1K;���0"Q�[�^��a��D��Ô_.u*���F���?�@Z] A�Dj��!�(�9���@�OɊ,��_d�2�8Ҁ�}N 	�.)��J��I���P��1���ܑT�~<E<g�o��������z�x�N_��l7����G�S�xw����qq3�� tWcP���'�V������}No�I)�'�mz�6�L�:u�yZnKm`��܊�T�Do��   =L�ك��5 �Ei6��'!Gc��]M�
Y�I3)��ܮ�xp��H�<����|2�Ι��H���$"���^WcaI��'�������%���SI��4�� o_�C<Kw����M3���BTp
^�x��z���Q�D�Yz&o�6n ��E��rP�5�Y^�Ē�_l�D�f�XK_��	��¶{K �����񄲬L�Lawo�8&��\;�}����0�رCc%�×UZ�@�-�K"΃�-)�G�B�$y�y�0[�6�˺���$O�t]���[�~P���|5#���?�@N�PW��p6�]>O�m4E�8O&^w���Ɠ��1;�F�Y�7NUgPk���B��O�g�
p
�DVsram��ڡ����88�R�əൢ�~�P$:���{k��@z1����޽��֙<,����`��5a'K��K���0Z��^]�ޥmn�E+�{ۍ!J_r��oe�#����Xib�,@"����́��b������s�^E��l ۽�>+�탛rdjxv�����$(>4Q0)��Bvh˲��Y�P������+��!C��ZI�{�1�fBD��S��
�U�%��Ĵ9ש��}�����8Nս7��9т��B�"²����Y���t]T��D�Mcf�#��w��2��;؂���, �H� �'�=��B�J�zP��a|�����K�/�[�GMk��.:,DRS�h��gʂ���m	����tfK��̡�۶i&�pRu�6"$|H,�3tM
�I8k�v�� ����i��/����~��u;-�FX�Z�~���V�D�\>�&��g�ʳ��{��P��LR�129A.�_�\��b��)��WD��hz�I[�(_W�����Z�N�����'%�l~�5���,r��F)Τ�hB�b��"�S�w$��k���pd�FJ��4�.#V1UQ���zߜe	ʹ"����R!�Mq+@<�_��sAI�3Y)i���dZ�Ό5*�{�z���T[�jc��m�����ЂkfDޝ�e��X/K	� �QR:4,5���s�岔�<�
�QsI�Б�O�Ed~a�f�:���%��)��HBK�s{���'�ZP��^
�ō��`0��������+on�M�\߉ ��'�,-L; �~.�������
i����`��C������h[�7��%���3���;����1�~s[��3����B�k`ç������Y	ŪK�?k[;݀���6\Iu?��<�����-	A��w/�������V�o1GyE]!��i2{�r�L��u��c;��Ji�5�=ڕ��Ҍy�"\)Z�ea����xL0�*�������6a!
�_2sI�{�r�)��Y
��Z�n���B�n�u���l4�m�m�I|0FW���Ƌ��|��W��W�̽��-���t& �vZ�%�~=�����<MjL�F�'�K�J�<��\�U���kש�I笔 2[Kg�#8j&��IĂ�X����X���ET��F=�v����wRu(�{�_��)y�!�+s_6� ����҅����^`7�>^���s��7��=��VWr<�&�bm���h"�0r����d�c.�� +�
6)iAY���i�\5�f�I�b�/jD!�T[���M����v��,�]dE#8mI��k	oĀ��b�AÙy;h�	�u�i6�M�cG~3`O#����M7h5��Y�o�L7�^y6l��@�/��7�<���(�[��?�{�IF��i� 3
˹��,��.�v>Y�]Hpq�$�Q�&�Z5�-��a��~c��f1r%)���+X"�٘���-,�����w��jQa\�.���]�.,��#E(M`_����:�b[���)'ۆ�2t�O��n�^��&D>���9(�ʾ��LD���'��A�=��
��ۮ`
��Yvt�Q"�ȱ��b���Z�����ۉ�� +;����7����C�����I/Ch��1N.�2* ����ӏ,0��#�4O��n���cO�ct�EKL����I�ku����~������z��P��_|�����>{         �   x�m�K�0��q�
6����*�
5bx��#GT��4��@��ȠQ!+Mgf�d��b�MԹ�o��E���V���AǨ"�L��1����ߎ&/qi��a�F8�d�Ƥޯ����A��-�f�ta?��m��~&�k�i6�%�T�	Yu����3�I���샱��y�R���NY         v   x�}�A
� Fᵞ�X�'��$XR�릑��
M�&��۾�;� DD
̾�����Q=S-�,-Me�Y̴�m}�9����h]� �x?�`k�@��1���������)�����"�         �   x�u�K
�0��q�
7���4�,؊����3'���`�$���~
Xdl�,�P�U|&!Q�e�*�&�A>`����W�_���yu��<�n_��W�g�jZu���M�rO�~B\�`��Xɹ���O�� �*��p��3�9.1�X�cG��\�B         �  x��Z�n�ȵ}�|EA���U�)Ql�n�tH�y�$jƈ��e&y�c���`�$@� ������-z�nu���1W���^{Q�2E%�LK&�R|Ӫv����G<\LS�5�����c�������U������.ʪ*IVٛ����*��"_d������ӕ��&ĐYF�t�L�,���1!t�$�i�)*���.�2b4�4�FK#�(��Ç�O^��駟N���[=<��t�������_O?|�[���n����]��Ïݻo���sw�L�wdӽ�t�#�	��u?�o�NI��O����/?t�n���mKV�n�7��恴��c���;���W?tx���n��+>������G���=�xOڷ+�kx��������?�GOǚP��;V�ъv+����zB�	���d�N��&|Gde����&њ�9�Ӣ	˲�.�*�!��XfEv�f�-,�����f���
��4�ܒ�U��<�=I��J��PZD�*�#&#Х!$g*r��2h8sj&�NX<�ƥ��:����ȃ�j`�2K��$�y��h�TS[�d�:$Y��$�5�����:%iY�y���V�����Nb�z|T�2�%(8�J�������?�\v�v�p��;Y�&���Zv�JR.��"��r��=*>�btT�u�;�$Ѧ]��G�}��u^����i��%����Ōvi����蚠k����K>��)7|�Q�8:�x���c��	3��,�Y�̪��oEVFUYg(�˲Z�sT�EY�e�tYγ�_
�S���^��Iݤ��Hj���Ԕ���Hʈ�7�0�xp񄎩J����P�e��T-�UsQFi	0�P�6J�:;k
�ze_�ly(��k�>�̓�QՃR(89B�i�V6ǣJ&܌Pi���w��Ô-�3r^6uUY٩�Y���q�d�k��W��-�|V����w��0,07��a�rs4��蠳|��?��$���0�&EA:Q�W�W�~�$��:K�M��Y���E#-JA�z�T	n�f㱎c(�4�^�x̎G(鄎��L��c��m�/ ��ݮh�Ak��@��v���prb�9:�魛&��y퀼8t>�RF�ܷge�t�^� ��k���YMv��D��U*I���&jԅ�,,�m�u'�� �e3GOa��syC0 m��M���ԏ'�j:P�t�*�>l��Tc�yI��h�P����D��S*��m'�a����h�zY�&T�U>�j�M��Vy��- �3w��������zǆ�蒊'��c�k��	�#lq����6��a��7��kЗ�C_�lj�
�J�z�s�{�W��Ge�AQ5��<�S��Q�Z�����#�Q���4'���_u�pU7�̺Ց3?9�ɾ��-�Q5����zolU��v7,F5*�-6�	&E����,fG1��P�	3����C['��&����)�AV���
��Os@g^��[��0Y�?�	L��Q8�QcP@;dq�2:c�G��!u:ٶ,9	�����Pfg`�xoBy
�_��ə���OPR�ԂSI0p��.�Q�����1�Rph6���� �y����n����&�������?<��C�σs�\�;�����<ȉ��;�e�|�MZ6���;��˼t-���|��ؽ���9,1��U6�����2�gf��e]4�㧢َ����u�wZ��y�R{�O�QC;��D$�`9>��n�Z�Q�NaA��I�Խ���"ߢ��V]b�8�h>�Ⱦ��+Ι30v>�����2
�o*Γ�eVQF���Ar���:�4���gj�MU���W�X����	xý?��~q���Z��L�		�8�N[��bcc�Kd��K��aB���X}�m�}t�(㢓	�"J����N����X�Es�{ϭğ�P�2����2�@Ը�����٦#w�9j���v�D�A���0���K�ތ�n%��˹�א.Y׷O���k�Tj��n���f#��4=�#y2Qc�[k������:����$w=Y�4Ǯ3w�Ż�[l�-��f}J�}��W,�/Y���KV>�V���b��
v.���UG�Z�y��.?��;=]�s�~��P���2'����3�f
��*�(ؒ�U���_v�6�T'��gk��-��D暎���;2����>�����$�f;���r�i�ِ�<iP�(/�Q�S��cT�^��O�ț��v*A�d���0�+�Z�e��h�"�V�^t��mo�c5:����/����Y���1������o�w.h;�K
Q���tn|�"���K��$)��s�W�Σ�����Έ:�&F	����ԧf.؆�M 6y>r@�dO��q�AT��W;]�ۅ�@�&(0��U&Ǒ0&�,��E�Y�](,��G���1�6B'd�I�ƴ�3��q���D��*vqL�IurR���T�8��Z�>���_]�>�ڥ��7�����`S��^�k,v�x�����������˲�֥�5J�3�5Aia�eQ��Y��6U3$�&�=J�L,�D	����+��/��3�l�����8�����uě�=]��"��h/j�>���
���	�x��b����M���ChKi�D%�î�1B%b��fk��}��.����]EA�w�O�����ְ��a�]t���z�S���z9@0Ôd[3}�!��?G
{c���J�µ���^i��kL�N�z�yz"%Q��cg��W�"B��HԽ�B��z�b����3 ����������e�N}Ѝ��f��N�G�q: C�JLL�[C��&��;��_ʬ��(�&[�V��I�+��-ȡ��qWg���s�#�hg0_����}�,/����E��{P�1��0B���1���fc��ƤT��BM���X;9A�V�"�ٞ79:<��rV�綀�^:S���r�㋹��b��{����w"��9���G�؄�2�oXqsӶ�s-�β��E�f �S����\BQr�ϲ�^��lNh�:#�1zH��(�%c��n@��ֶ 4I���_cb���_7э]L+���'�`^�3���|x����8���9�\���!��g,d*9�(=�c�F�冻��p��>���Yt�������[U���?��*�O�U,z���̇�:I�Bb����P�ܡ�:|��O�5S��#��圇��Ck��`��/�c�q��m�d���8n6�>�'3�l\��
�����_���>��{1��ڋ�u��ȹ�e�g2�Ք�a)4Q�
���\������`�y�����Ëү��<�=�Ͳǟ�O��s��P�^A|�6�Ʃ@[\���r����\b
x3����c���oO=:9X�V��o��? �B�x�v����a�a�ssS
3�/*s���c>�ḋ���M��-J�aGt�A�Sv��:?��/��n߯�+�ۓ��?y���_�w^�ŌÙi�`ܿ���t_��w�8+|B��Hܳ�Cg�<y֣�w3��_P�W×4�V���I�v瓸׃aW0A��P�G�M���%��|KI�I� �*���f�=k���E���}��v��N���׽u�}�`H`���=����yJi������j���߽mo�|&��Ň�=�d�F��M<���s��l����eQ.������lc���� ؊wG�����![��+@I�}��R[�Q�=��B��Y	o�� ��Ȫ���zۛ9E�Q,������M�����H;u�Š/��rw�@�u��vJ� ��}P�Q{P&f����Rsu^�/���2Ǟ=#p6���	6һ� �伟R������h�SJ�8@c�Z�.~M��{���M@[��f����o���{(�[�*��;�5��m��f��瘸�q�x�y����ƙb=mn�Hx�{�Hp�� �y���Ã�Sު�lݪq9��p=b�20����8����6�y=d#>�	�ʁ��u	R�R��K��  ��ɼ4L�'LO��?�~��7��/�            x������ � �            x������ � �            x������ � �         �  x���[n�H��;�`���i��1I�0D�#�h^��3k��M��h�vf$,�����bNP�S`��^x���ғ�m�����}���}��e���v����g&
�v`v�<Sx�_�B/pi| _��vE36����:g[ؠ�S����jV����T`7TM��UǨ�kr<�O}7���߀�;Jw��x�|9k�2E�껪~���ۊ�<�3*�LKL�cs��WQY{�����?g
x���fE�}�����8�+<��}���|/eTe��Xo%�<�Ofy��O�֟�x�C��M�����P��ų�����Cg�CR@��C?l�*אK5��h���b�n�;�I��]���#H54���m��l3_>h�;�
��1����vcԑ�GD��g�0O��fB�ꢳv�i�w�}�
aV�e3y;���� "���Ś���J�(JAN�^a��s5���2����K�ѱ@�s[��\�5P�LE�Dƅ��Cctج�����`�6<�7`�U�W�]�фv8�m���r���~f�gvI!o}�Ź���|��l�����z��ͳ���p/Q���T�C����ͧy��z�i�V著&? ��$��� �]h �a�tvW�����8���4!&[`�Lo6�}u�oV���dFP�CɃoM��ڟ���'P����G� ����2i�I)���lD���͈����Vx;���q.z��6#��N�t��4$d4��̳?ߞ�LKK6��-��󈛢#\�L����ԧ}�
��%^���%&.J�g)��{�6��d����R�.���s׍壩�n��K����g��"!W�K��/�~Q����1���fyH8�8nt��]�.Rn��p��6m�W�J���4)�q+�����a�}..��ڡj��C�m<��+#�[�.�<R3�,���6_����?�xzz����/      	   �  x���Q��0�g�\`+{<c3~�tK�@7@�V}�`ߦ=�^�R-d+�"E"!����o��$*�X"\�y�r�A�c����ԝ��[��͵�zyV���d�P˷��;��G:�[ �Y�a�6�9�.�ɡ��F�Nk�R�qQE%
��i�f�v�yd�q��&S���M��rf�(%qA��>�폟�s��$h�&��b��& ���6f�@@�$�q�����l}]�l\�g��b|g8��J�Y�1���K�_��+��?���媇�@�otvJ:2{�֋�q P�Էe���qZ�]�$gwD6�	rQ4�*mf�#{,�w���oUqׄءu$�Y�r��h��������R�]s~��ѿ�T���"��A��S�pAcDQ~�������ʣ��ҭ�`��\O�]y�#Ek�9�)�蟛��_;�$9����D��5�zRCHS�zf���8}����_���_f���         �   x�u�K
�0F�q�
7P��}Hҙ����B:tҤ���ԁ2?&)��Ìˢ�JU�JC��C����#� '��X���<��s!�s��9N����)�K�%���1�#��ƹXe�p������{��u5M         �  x������ ���)|�luC��8$KU�,��l�%*��<Ӿآ��v�ֲ<��}���%
,��BJ>H�z���g޺��������|@�p�z:�Ȱ����8�<���&)i*�M'~��n0�-X�
�EAe����u�����uk�n����Wǘ�(bdgӺ&�!3�f��]���;�DPA�5�ì�	��GZ}�K����Vj��%	�݆���?���G_����-`�&Z�Ӡr����u��V�em�|aĜ�T�}�?um]kB֙��uj�{V[�v�<��Y����ӊ��#n��w�z��vmg������_�|m��rP#Ӌ���|�t�n~�l����+��(�H�h��5ɥ�}i)*xI$<�$�X��i>@��U�������%����?��         �   x�m�K�0��)�@��ĩ�](A��4��Ш��E �Q�o�2xt(����YI�!�!�r�eL�AC�ߡۡD������mw1%O5]K:׼m���ԫSf�7���i��<��@�������U�7	m��l_�<���Z� �6-     