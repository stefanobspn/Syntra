import { Navbar } from '../components/Navbar';
import { HeroSection } from '../components/HeroSection';
import { FeaturesSection } from '../components/FeaturesSection';
import { AboutSection } from '../components/AboutSection';
import { CallToActionSection } from '../components/CallToActionSection';
import { Footer } from '../components/Footer';

export function Home() {
  return (
    <div className="min-h-screen bg-background">
      <Navbar />
      <HeroSection />
      <FeaturesSection />
      <AboutSection />
      <CallToActionSection />
      <Footer />
    </div>
  );
}
