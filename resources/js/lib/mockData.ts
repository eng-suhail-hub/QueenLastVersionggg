export interface University {
  id: string;
  name: string;
  nameAr: string;
  location: string;
  locationAr: string;
  rating: number;
  fees: number;
  image: string;
  logo: string;
  description: string;
  descriptionAr: string;
  mapUrl?: string;
}

export interface College {
  id: string;
  name: string;
  nameAr: string;
  image: string;
  majors: Major[];
}

export interface Major {
  id: string;
  name: string;
  nameAr: string;
  collegeId: string;
  description: string;
  descriptionAr: string;
  years: number;
  fees: number;
  gpa: number;
  careerOpportunities?: string[];
  careerOpportunitiesAr?: string[];
}

export interface Article {
  id: string;
  title: string;
  titleAr: string;
  image: string;
  universityId: string;
  universityName: string;
  universityNameAr: string;
  date: string;
  content: string;
  likes: number;
}

import uniImage1 from '@assets/generated_images/classic_university_building.png';
import uniImage2 from '@assets/generated_images/high-tech_engineering_campus.png';
import uniImage3 from '@assets/generated_images/modern_university_campus_hero.png';

export const universities: University[] = [
  {
    id: '1',
    name: 'King Saud University',
    nameAr: 'جامعة الملك سعود',
    location: 'Riyadh, Saudi Arabia',
    locationAr: 'الرياض، المملكة العربية السعودية',
    rating: 4.8,
    fees: 0,
    image: uniImage1,
    logo: 'https://images.unsplash.com/photo-1599305090598-fe179d501227?w=200&h=200&fit=crop',
    description: 'A premier public university in Riyadh, known for its extensive research programs.',
    descriptionAr: 'جامعة حكومية رائدة في الرياض، تشتهر ببرامجها البحثية المكثفة.',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m13!1d3623.238622147317!2d46.61904127595204!3d24.717013350222033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f1cd8f8373f73%3A0xc665e12815197f26!2sKing%20Saud%20University!5e0!3m2!1sen!2ssa!4v1705574400000!5m2!1sen!2ssa'
  },
  {
    id: '2',
    name: 'King Fahd University of Petroleum & Minerals',
    nameAr: 'جامعة الملك فهد للبترول والمعادن',
    location: 'Dhahran, Saudi Arabia',
    locationAr: 'الظهران، المملكة العربية السعودية',
    rating: 4.9,
    fees: 0,
    image: uniImage2,
    logo: 'https://images.unsplash.com/photo-1599305090598-fe179d501227?w=200&h=200&fit=crop',
    description: 'Specialized in science, engineering, and management. A hub for innovation.',
    descriptionAr: 'متخصصة في العلوم والهندسة والإدارة. مركز للابتكار.',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m12!1m3!1d3579.526274474327!2d50.1346083!3d26.3117407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49e917d1217f25%3A0xa976b9f298816f0e!2sKing%20Fahd%20University%20of%20Petroleum%20and%20Minerals!5e0!3m2!1sen!2ssa!4v1705574500000!5m2!1sen!2ssa'
  },
  {
    id: '3',
    name: 'Alfaisal University',
    nameAr: 'جامعة الفيصل',
    location: 'Riyadh, Saudi Arabia',
    locationAr: 'الرياض، المملكة العربية السعودية',
    rating: 4.5,
    fees: 80000,
    image: uniImage3,
    logo: 'https://images.unsplash.com/photo-1599305090598-fe179d501227?w=200&h=200&fit=crop',
    description: 'A private non-profit university offering world-class education.',
    descriptionAr: 'جامعة خاصة غير ربحية تقدم تعليماً بمستوى عالمي.',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m12!1m3!1d3624.471556858102!2d46.6713847!3d24.6896264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f036720e3d555%3A0x6b490f29637c35a8!2sAlfaisal%20University!5e0!3m2!1sen!2ssa!4v1705574600000!5m2!1sen!2ssa'
  }
];

export const colleges: College[] = [
  {
    id: 'c1',
    name: 'College of Engineering',
    nameAr: 'كلية الهندسة',
    image: uniImage2,
    majors: []
  },
  {
    id: 'c2',
    name: 'College of Medicine',
    nameAr: 'كلية الطب',
    image: uniImage3,
    majors: []
  },
  {
    id: 'c3',
    name: 'College of Computer Science',
    nameAr: 'كلية علوم الحاسب',
    image: uniImage2,
    majors: []
  }
];

export const majors: Major[] = [
  {
    id: 'm1',
    name: 'Software Engineering',
    nameAr: 'هندسة البرمجيات',
    collegeId: 'c3',
    description: 'Learn to design and build complex software systems.',
    descriptionAr: 'تعلم تصميم وبناء أنظمة البرمجيات المعقدة.',
    years: 4,
    fees: 80000,
    gpa: 4.5,
    careerOpportunities: ['Software Developer', 'Systems Architect', 'Project Manager'],
    careerOpportunitiesAr: ['مطور برمجيات', 'معماري أنظمة', 'مدير مشاريع']
  },
  {
    id: 'm2',
    name: 'Civil Engineering',
    nameAr: 'الهندسة المدنية',
    collegeId: 'c1',
    description: 'Design and oversee construction of infrastructure projects.',
    descriptionAr: 'تصميم والإشراف على بناء مشاريع البنية التحتية.',
    years: 4,
    fees: 75000,
    gpa: 4.0,
    careerOpportunities: ['Civil Engineer', 'Structural Designer', 'Site Manager'],
    careerOpportunitiesAr: ['مهندس مدني', 'مصمم إنشائي', 'مدير موقع']
  },
  {
    id: 'm3',
    name: 'Medicine',
    nameAr: 'الطب',
    collegeId: 'c2',
    description: 'Prepare for a career in healthcare and patient treatment.',
    descriptionAr: 'الاستعداد لمهنة في مجال الرعاية الصحية وعلاج المرضى.',
    years: 7,
    fees: 120000,
    gpa: 4.8,
    careerOpportunities: ['Physician', 'Surgeon', 'Medical Researcher'],
    careerOpportunitiesAr: ['طبيب عام', 'جراح', 'باحث طبي']
  }
];

// Link majors to colleges
colleges[0].majors = [majors[1]];
colleges[1].majors = [majors[2]];
colleges[2].majors = [majors[0]];

export const articles: Article[] = [
  {
    id: 'a1',
    title: 'Top 10 Tips for Freshmen',
    titleAr: 'أهم 10 نصائح للطلاب المستجدين',
    image: uniImage1,
    universityId: '1',
    universityName: 'King Saud University',
    universityNameAr: 'جامعة الملك سعود',
    date: '2025-10-15',
    content: 'Starting university can be daunting. Here are some tips to help you succeed in your first year. Make sure to attend all your lectures, participate in student activities, and manage your time effectively between studies and social life.',
    likes: 124
  },
  {
    id: 'a2',
    title: 'The Future of AI in Education',
    titleAr: 'مستقبل الذكاء الاصطناعي في التعليم',
    image: uniImage2,
    universityId: '2',
    universityName: 'KFUPM',
    universityNameAr: 'جامعة الملك فهد',
    date: '2025-11-01',
    content: 'How artificial intelligence is reshaping the way we learn and teach. AI tools are helping researchers process data faster and providing personalized learning experiences for students around the world.',
    likes: 89
  },
  {
    id: 'a3',
    title: 'Engineering Innovations 2026',
    titleAr: 'ابتكارات هندسية 2026',
    image: uniImage2,
    universityId: '2',
    universityName: 'KFUPM',
    universityNameAr: 'جامعة الملك فهد',
    date: '2026-01-10',
    content: 'Exploring the latest breakthroughs in civil and electrical engineering. New sustainable materials and smart city technologies are leading the way for a better future.',
    likes: 56
  }
];
