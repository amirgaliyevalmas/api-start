import { Ability, AbilityBuilder } from '@casl/ability';
import {ref} from "vue";
import axios from "axios";
//import useUser from "../components/user/hooks/user";



    const defineAbility = () => {
        const {can, cannot, build} = new AbilityBuilder(Ability);

      //  const {current_user, getCurrentUser} = useUser();

        const abilities = ref([]);
        const current_user = ref([]);
        const arr = [];


        const getCurrentUser = async () => {
            const response = await  axios.get("/api/v1/user/one/");
            current_user.value = response.data.data;
           current_user.value.forEach((element, index) => {
               abilities.value.push(element[0]);
           });

            Object.keys(current_user.value).forEach(key => {
                console.log(key, current_user.value[key]);
            });
           // abilities.value = current_user.value.flat();
       };


     getCurrentUser();






        can(abilities, 'DepartmentComponent');




        return build();
    }

    export default defineAbility();