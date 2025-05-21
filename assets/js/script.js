// JavaScript for elite, elegant, premium veterinary clinic landing page

// Smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('a[href^="#"]');
    for (const link of links) {
        link.addEventListener('click', smoothScroll);
    }

    function smoothScroll(event) {
        event.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 60,
                behavior: 'smooth'
            });
        }
    }

    // Handle Get Started button click to scroll to rabies analysis section
    const getStartedBtn = document.getElementById('get-started-btn');
    if (getStartedBtn) {
        getStartedBtn.addEventListener('click', () => {
            const rabiesSection = document.getElementById('rabies-analysis');
            if (rabiesSection) {
                window.scrollTo({
                    top: rabiesSection.offsetTop - 60,
                    behavior: 'smooth'
                });
            }
        });
    }

    // Certainty Factor method for rabies analysis
    const rabiesForm = document.getElementById('rabies-form');
    const analysisResult = document.getElementById('analysis-result');

    if (rabiesForm && analysisResult) {
        rabiesForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const animalType = document.getElementById('animal-type').value;
            const symptom1 = parseFloat(document.getElementById('symptom1').value);
            const symptom2 = parseFloat(document.getElementById('symptom2').value);

            if (!animalType) {
                analysisResult.textContent = 'Please select an animal type.';
                return;
            }
            if (isNaN(symptom1) || symptom1 < 0 || symptom1 > 1 || isNaN(symptom2) || symptom2 < 0 || symptom2 > 1) {
                analysisResult.textContent = 'Please enter valid certainty factors between 0 and 1 for symptoms.';
                return;
            }

            // Combine certainty factors using CF combination formula
            // CFcombined = CF1 + CF2 * (1 - CF1)
            const combinedCF = symptom1 + symptom2 * (1 - symptom1);

            // Interpret the result
            let diagnosis = '';
            if (combinedCF >= 0.8) {
                diagnosis = `High certainty of rabies in the ${animalType}. Immediate veterinary attention recommended.`;
            } else if (combinedCF >= 0.5) {
                diagnosis = `Moderate certainty of rabies in the ${animalType}. Monitor symptoms closely and consult a vet.`;
            } else {
                diagnosis = `Low certainty of rabies in the ${animalType}. Unlikely but stay cautious.`;
            }

            analysisResult.textContent = `Certainty Factor: ${combinedCF.toFixed(2)}. ${diagnosis}`;
        });
    }
});
