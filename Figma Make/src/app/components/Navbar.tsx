import { Menu, X } from 'lucide-react';
import { useState } from 'react';
import { Link } from 'react-router';

export function Navbar() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <nav className="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md border-b border-border z-50">
      <div className="max-w-7xl mx-auto px-6 py-4">
        <div className="flex items-center justify-between">
          <Link to="/" className="flex items-center gap-2">
            <div className="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
              <span className="text-white font-bold text-lg">S</span>
            </div>
            <span className="font-semibold text-xl text-foreground">Syntra</span>
          </Link>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center gap-8">
            <a href="#fitur" className="text-muted-foreground hover:text-foreground transition-colors">
              Fitur
            </a>
            <a href="#tentang" className="text-muted-foreground hover:text-foreground transition-colors">
              Tentang
            </a>
            <Link to="/login" className="text-muted-foreground hover:text-foreground transition-colors">
              Login
            </Link>
          </div>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsOpen(!isOpen)}
            className="md:hidden p-2 text-muted-foreground hover:text-foreground"
          >
            {isOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile Menu */}
        {isOpen && (
          <div className="md:hidden pt-4 pb-2 flex flex-col gap-3">
            <a href="#fitur" className="text-muted-foreground hover:text-foreground transition-colors py-2">
              Fitur
            </a>
            <a href="#tentang" className="text-muted-foreground hover:text-foreground transition-colors py-2">
              Tentang
            </a>
            <Link to="/login" className="text-muted-foreground hover:text-foreground transition-colors py-2">
              Login
            </Link>
          </div>
        )}
      </div>
    </nav>
  );
}
