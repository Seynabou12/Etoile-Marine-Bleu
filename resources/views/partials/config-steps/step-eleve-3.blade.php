<div class="row step-3">
    <div class="col-12">
        <div class="step__title__container">
            <div class="step__title">
                <div class="step__title__text">
                    {{ __('dashboard.personnalite_carriere') }}<br>
                    <small>{{ __('dashboard.choisissez_personnalite') }}</small>
                </div>
            </div>
        </div>
        <div class="step__body">
            <div class="bg-light radius-20 p-3">
                <h5 class="mb-0">
                    {{ __('dashboard.personnalite') }}
                    <a href="https://www.16personalities.com/" target="_blank" class="step__body__button">
                       {{__('dashboard.faites_les_test_de_personnalite')}}
                        <i class="fa fa-list-alt step__body__button__icon" aria-hidden="true"></i>
                    </a>
                </h5>
                <small>{{ __('dashboard.faites_le_test_et_remplissez_le_champ_correspondant') }}</small>
                <div class="form-group row mb-0">
                    <label for="personality" class="col-4 col-form-label pt-1">{{ __('dashboard.votre_personnalite') }}</label>
                    <div class="col-8">
                        <select name="personality_id" id="personality" class="form-control form-control-sm">
                            @foreach ($personalities as $personality )
                                <option value="{{$personality->id}}"
                                    @if($objet->personality_id == $personality->id) selected @endisset>
                                    {{$personality->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-light p-3 mt-2 radius-20">
                <h5>{{ __('dashboard.carriere') }}</h5>
                <small class="text-danger">{{ __('dashboard.vous_pouvez_faire_un_maximum_de_3_choix') }}</small>
                <table>
                    <thead>
                        <th>#</th>
                        <th>{{ __('home.University') }}</th>
                        <th>{{ __('dashboard.facultes') }}</th>
                        <th>{{ __('dashboard.departement') }}</th>
                    </thead>
                    <tbody>
                        @for ($i=1;$i<=3;$i++)
                            <tr class="choices_tr">
                                <td>{{ $i }}</td>
                                <td>
                                    <select name="choices[{{$i}}][university_id]" id="choices_{{$i}}_university" class="form-control choices__select university">
                                        <option value='-1'>{{ __('dashboard.choisissez_personnalite') }}</option>
                                        @foreach ($universities as $university )
                                            <option @if(isset($objet->choices[$i]['university_id']) && $objet->choices[$i]['university_id'] == $university->id) selected @endisset
                                                value="{{$university->id}}">
                                                {{$university->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="choices[{{$i}}][faculty_id]" id="choices_{{$i}}_faculty " class="form-control choices__select faculty">
                                        <option value='-1'>{{ __('dashboard.faculte') }}</option>
                                        @foreach ($faculties as $faculty )
                                            <option
                                                @if(isset($objet->choices[$i]['faculty_id']) && $objet->choices[$i]['faculty_id'] == $faculty->id) selected @endisset
                                                class="univ_{{$faculty->universite_id}}_fac_opt fac_opt" value="{{$faculty->id}}">
                                                {{$faculty->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="choices[{{$i}}][department_id]" id="choices_{{$i}}_department" class="form-control choices__select department">
                                        <option value='-1'>{{ __('dashboard.departement') }}</option>
                                        @foreach ($departments as $department )
                                            <option
                                                @if(isset($objet->choices[$i]['department_id']) && $objet->choices[$i]['department_id'] == $department->id) selected @endisset
                                                class="fac_{{$department->faculte_id}}_dep_opt dep_opt" value="{{$department->id}}">
                                                {{$department->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <input type="hidden" name="choices[{{$i}}][date]" value="{{\Carbon\Carbon::now()}}">
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@push('components-scripts')
    <script>
        $(function(){
            //disable($('.faculty'));
            //disable($('.department'));
            init();
        });

        $('.university').change(function(){
            university = $(this);
            faculty = university.closest('.choices_tr').find('.faculty');
            department = university.closest('.choices_tr').find('.department');
            if(university.val()=='-1') {
                disable(faculty);
                reset(faculty);
                disable(department);
                reset(department);
            }else{
                reset(faculty);
                enable(faculty);
                disable(department);
                reset(department);
                showFaculties(faculty,university.val());
            }
        })

        $('.faculty').change(function(){
            faculty = $(this);
            department = faculty.closest('.choices_tr').find('.department');
            if(faculty.val()=='-1') {
                disable(department);
                reset(department);
            }else{
                reset(department);
                enable(department);
                showDepartment(department,faculty.val());
            }
        })

        function disable(element){
            element.prop('disabled', true).attr('style','background-color : #eee !important');
        }
        function enable(element){
            element.prop('disabled', false).attr('style','background-color : #fff !important');
        }
        function showFaculties(select,university_id){
            select.find('.fac_opt').hide();
            select.find('.univ_'+university_id+'_fac_opt').show();
        }
        function showDepartment(select,faculty_id){
            select.find('.dep_opt').hide();
            select.find('.fac_'+faculty_id+'_dep_opt').show();
        }
        function reset(select){
            select.val('-1');
        }
        function init(){
            $('.university').each(function(){
                if($(this).val()!='-1'){
                    university = $(this);
                    faculty = university.closest('.choices_tr').find('.faculty');
                    showFaculties(faculty,university.val());
                }
            });
            $('.faculty').each(function(){
                faculty = $(this);
                department = faculty.closest('.choices_tr').find('.department');
                if(faculty.val()=='-1'){
                    disable(faculty);
                }else{
                    showDepartment(department,faculty.val());
                }
            })
            $('.department').each(function(){
                if($(this).val()=='-1') disable($(this));
            })

        }



    </script>
@endpush
