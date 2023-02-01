$(function() {

    const steps = Array.from(document.querySelectorAll('form .step'));
    const menu = Array.from(document.querySelectorAll('form .step-menu'));
    const menu2 = Array.from(document.querySelectorAll('form .step-menu2'));
    const nextBtn = document.querySelectorAll('form .next-btn');
    const prevBtn = document.querySelectorAll('form .prev-btn');
    const form = document.querySelector('form');

    nextBtn.forEach(button => {
        button.addEventListener('click', () => {
            changeStep('next')
        })
    });
    prevBtn.forEach(button => {
        button.addEventListener('click', () => {
            changeStep('prev')
        })
    });

    function saveData(url, name) {
        var formData = [];
        $.each($("input[name='" + name + "']:checked"), function() {
            formData.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: url,
            data: { data: formData }
        })
    }

    function changeStep(btn) {
        let index = 0;
        const active = document.querySelector('form .step.active');
        index = steps.indexOf(active);
        console.log(index);
        if (index == 0) {
            saveData("contribution/create-step-one", 'etude_ids[]');
        }
        if (index == 1) {
            saveData("contribution/create-step-two", 'centre_interet_ids[]');
        }
        if (index == 2) {
            saveData("contribution/create-step-three", 'personnalite_id');
        }
        steps[index].classList.remove('active');
        // menu[index].classList.remove('active');

        if (btn === 'next') index++;
        if (btn === 'prev') index--;
        steps[index].classList.add('active');
        menu[index].classList.add('active');

    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const inputs = [];

        form.querySelectorAll('input').forEach(input => {
            const { name, value } = input;
            inputs.push({ name, value });
        })
        console.log(inputs);
        form.reset();
        let index = 0;
        const active = document.querySelector('form .step.active');
        index = steps.indexOf(active);
        steps[index].classList.remove('active');
        steps[1].classList.add('active');

    })
});
